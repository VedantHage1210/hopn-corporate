<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MediaAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MediaAssetController extends Controller
{
    public function index(Request $request)
    {
        $query = MediaAsset::latest();

        if ($request->filled('type')) {
            $query->where('mime_type', 'like', $request->type . '%');
        }
        if ($request->filled('search')) {
            $query->where('file_name', 'like', '%' . $request->search . '%');
        }

        $items = $query->paginate(20);
        return view('admin.media.index', compact('items'));
    }

    public function create()
    {
        $item = new MediaAsset();
        return view('admin.media.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'        => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,mp4|max:10240',
            'title'       => 'nullable|string|max:255',
            'title_de'    => 'nullable|string|max:255',
            'alt_text'    => 'nullable|string|max:255',
            'alt_text_de' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');

        // Upload to Cloudinary
        $cloudName  = config('cloudinary.cloud_name');
        $apiKey     = config('cloudinary.api_key');
        $apiSecret  = config('cloudinary.api_secret');
        $timestamp  = time();
        $signature  = sha1("folder=hopn-media&timestamp={$timestamp}{$apiSecret}");

        $response = Http::attach(
            'file', file_get_contents($file->getRealPath()), $file->getClientOriginalName()
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/auto/upload", [
            'api_key'   => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
            'folder'    => 'hopn-media',
        ]);

        if (!$response->successful()) {
            return back()->withErrors(['file' => 'Cloudinary upload failed: ' . $response->body()]);
        }

        $result = $response->json();

        MediaAsset::create([
            'disk'        => 'cloudinary',
            'path'        => $result['secure_url'],
            'file_name'   => $file->getClientOriginalName(),
            'mime_type'   => $file->getMimeType(),
            'size'        => $file->getSize(),
            'title'       => $request->title,
            'title_de'    => $request->title_de,
            'alt_text'    => $request->alt_text,
            'alt_text_de' => $request->alt_text_de,
            'meta'        => [
                'public_id'   => $result['public_id'],
                'resource_type' => $result['resource_type'],
                'format'      => $result['format'],
                'width'       => $result['width'] ?? null,
                'height'      => $result['height'] ?? null,
            ],
        ]);

        return redirect()->route('admin.media-assets.index')->with('status', 'Media uploaded to Cloudinary.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.media-assets.edit', $id);
    }

    public function edit(string $id)
    {
        $item = MediaAsset::findOrFail($id);
        return view('admin.media.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $asset = MediaAsset::findOrFail($id);

        $request->validate([
            'title'       => 'nullable|string|max:255',
            'title_de'    => 'nullable|string|max:255',
            'alt_text'    => 'nullable|string|max:255',
            'alt_text_de' => 'nullable|string|max:255',
        ]);

        $asset->update([
            'title'       => $request->title,
            'title_de'    => $request->title_de,
            'alt_text'    => $request->alt_text,
            'alt_text_de' => $request->alt_text_de,
        ]);

        return redirect()->route('admin.media-assets.index')->with('status', 'Media updated.');
    }

    public function destroy(string $id)
    {
        $asset = MediaAsset::findOrFail($id);

        // Delete from Cloudinary
        if ($asset->disk === 'cloudinary' && !empty($asset->meta['public_id'])) {
            $cloudName = config('cloudinary.cloud_name');
            $apiKey    = config('cloudinary.api_key');
            $apiSecret = config('cloudinary.api_secret');
            $publicId  = $asset->meta['public_id'];
            $timestamp = time();
            $signature = sha1("public_id={$publicId}&timestamp={$timestamp}{$apiSecret}");

            Http::post("https://api.cloudinary.com/v1_1/{$cloudName}/image/destroy", [
                'public_id' => $publicId,
                'api_key'   => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
            ]);
        }

        $asset->delete();
        return redirect()->route('admin.media-assets.index')->with('status', 'Media deleted.');
    }
}
