<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaAsset;
use Illuminate\Http\Request;

class MediaAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shared.index', [
            'title' => 'Media Library',
            'items' => MediaAsset::query()->latest()->paginate(20),
            'columns' => ['ID' => 'id', 'File' => 'file_name', 'Mime' => 'mime_type', 'Path' => 'path'],
            'createRoute' => route('admin.media-assets.create'),
            'editRouteName' => 'admin.media-assets.edit',
            'destroyRouteName' => 'admin.media-assets.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shared.form', [
            'title' => 'Upload Media Asset',
            'action' => route('admin.media-assets.store'),
            'method' => 'POST',
            'fields' => [
                ['name' => 'file', 'label' => 'File', 'type' => 'file'],
                ['name' => 'title', 'label' => 'Title'],
                ['name' => 'alt_text', 'label' => 'Alt Text'],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,pdf,mp4', 'max:10240'],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);
        $file = $request->file('file');
        $path = $file->store('media', 'public');
        MediaAsset::create([
            'disk' => 'public',
            'path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'title' => $data['title'] ?? null,
            'alt_text' => $data['alt_text'] ?? null,
        ]);
        return redirect()->route('admin.media-assets.index')->with('status', 'Media uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.media-assets.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset = MediaAsset::findOrFail($id);
        return view('admin.shared.form', [
            'title' => 'Edit Media Asset',
            'action' => route('admin.media-assets.update', $asset->id),
            'method' => 'PUT',
            'item' => $asset,
            'fields' => [
                ['name' => 'title', 'label' => 'Title'],
                ['name' => 'alt_text', 'label' => 'Alt Text'],
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asset = MediaAsset::findOrFail($id);
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);
        $asset->update($data);
        return redirect()->route('admin.media-assets.index')->with('status', 'Media updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MediaAsset::findOrFail($id)->delete();
        return redirect()->route('admin.media-assets.index')->with('status', 'Media deleted.');
    }
}
