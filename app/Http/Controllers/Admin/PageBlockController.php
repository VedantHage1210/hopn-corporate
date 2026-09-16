<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageBlock;
use Illuminate\Http\Request;

class PageBlockController extends Controller
{
    public function store(Request $request, Page $page)
    {
        $data = $request->validate([
            'block_type' => 'required|string|in:' . implode(',', array_keys(PageBlock::TYPES)),
        ]);

        $block = $page->blocks()->create([
            'block_type' => $data['block_type'],
            'title'      => 'New ' . ucfirst($data['block_type']) . ' block',
            'content'    => ['en' => [], 'de' => [], 'ar' => []],
            'sort_order' => $page->blocks()->max('sort_order') + 1,
            'is_visible' => true,
        ]);

        $page->saveVersion(auth()->user()->name ?? 'Admin', 'Added ' . $data['block_type'] . ' block');

        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Block added — edit its content below.');
    }

    public function update(Request $request, Page $page, PageBlock $block)
    {
        abort_unless($block->page_id === $page->id, 404);

        $fields = PageBlock::TYPES[$block->block_type] ?? [];

        $data = $request->validate([
            'title'      => 'nullable|string|max:255',
            'title_de'   => 'nullable|string|max:255',
            'title_ar'   => 'nullable|string|max:255',
            'is_visible' => 'nullable|boolean',
        ]);

        $content = $block->content ?? ['en' => [], 'de' => [], 'ar' => []];
        foreach (['en', 'de', 'ar'] as $lang) {
            foreach ($fields as $field) {
                if ($field === 'items') {
                    // Cards block: one "Title | Description" per line.
                    $lines = collect(explode("\n", $request->input("content_{$lang}_items", '')))
                        ->map(fn ($l) => trim($l))
                        ->filter()
                        ->map(function ($line) {
                            [$title, $desc] = array_pad(explode('|', $line, 2), 2, '');
                            return ['title' => trim($title), 'description' => trim($desc)];
                        })->values()->all();
                    $content[$lang]['items'] = $lines;
                } else {
                    $content[$lang][$field] = $request->input("content_{$lang}_{$field}");
                }
            }
        }

        $block->update([
            'title'      => $data['title'] ?? $block->title,
            'title_de'   => $data['title_de'] ?? $block->title_de,
            'title_ar'   => $data['title_ar'] ?? $block->title_ar,
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible', true),
        ]);

        $page->saveVersion(auth()->user()->name ?? 'Admin', 'Edited block #' . $block->id);

        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Block updated.');
    }

    public function destroy(Page $page, PageBlock $block)
    {
        abort_unless($block->page_id === $page->id, 404);

        $block->delete();
        $page->saveVersion(auth()->user()->name ?? 'Admin', 'Removed a block');
        return redirect()->route('admin.pages.edit', $page->id)->with('status', 'Block removed.');
    }

    /**
     * Drag-and-drop reorder — receives the new block ID order and saves
     * sort_order accordingly. Called via fetch() from the page editor,
     * no page reload.
     */
    public function reorder(Request $request, Page $page)
    {
        $data = $request->validate([
            'order'   => 'required|array',
            'order.*' => 'integer',
        ]);

        foreach ($data['order'] as $index => $blockId) {
            PageBlock::where('id', $blockId)->where('page_id', $page->id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }
}
