<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MediaAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'file'       => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,mp4|max:10240',
            'title'      => 'nullable|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'alt_text'   => 'nullable|string|max:255',
            'alt_text_de'=> 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $path = $file->store('media', 'public');

        MediaAsset::create([
            'disk'       => 'public',
            'path'       => $path,
            'file_name'  => $file->getClientOriginalName(),
            'mime_type'  => $file->getMimeType(),
            'size'       => $file->getSize(),
            'title'      => $request->title,
            'title_de'   => $request->title_de,
            'alt_text'   => $request->alt_text,
            'alt_text_de'=> $request->alt_text_de,
        ]);

        return redirect()->route('admin.media-assets.index')->with('status', 'Media uploaded.');
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
            'title'      => 'nullable|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'alt_text'   => 'nullable|string|max:255',
            'alt_text_de'=> 'nullable|string|max:255',
        ]);

        $asset->update([
            'title'      => $request->title,
            'title_de'   => $request->title_de,
            'alt_text'   => $request->alt_text,
            'alt_text_de'=> $request->alt_text_de,
        ]);

        return redirect()->route('admin.media-assets.index')->with('status', 'Media updated.');
    }

    public function destroy(string $id)
    {
        $asset = MediaAsset::findOrFail($id);
        Storage::disk($asset->disk ?? 'public')->delete($asset->path);
        $asset->delete();
        return redirect()->route('admin.media-assets.index')->with('status', 'Media deleted.');
    }
}
