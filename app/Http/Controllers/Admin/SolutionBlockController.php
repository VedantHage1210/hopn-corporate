<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SolutionPage;
use App\Models\SolutionBlock;
use Illuminate\Http\Request;

class SolutionBlockController extends Controller
{
    public function index(Request $request, string $pageId)
    {
        $page = SolutionPage::findOrFail($pageId);
        $type = $request->query('type', 'capability');
        $items = $page->blocks()->where('block_type', $type)->orderBy('sort_order')->get();
        return view('admin.solution-blocks.index', compact('page', 'items', 'type'));
    }

    public function create(Request $request, string $pageId)
    {
        $page = SolutionPage::findOrFail($pageId);
        $item = new SolutionBlock();
        $item->block_type = $request->query('type', 'capability');
        return view('admin.solution-blocks.form', compact('page', 'item'));
    }

    public function store(Request $request, string $pageId)
    {
        $page = SolutionPage::findOrFail($pageId);
        $data = $this->extract($request);
        $data['solution_page_id'] = $page->id;
        SolutionBlock::create($data);
        return redirect()->route('admin.solution-blocks.index', ['page' => $page->id, 'type' => $data['block_type']])->with('status', 'Item created.');
    }

    public function edit(string $pageId, string $id)
    {
        $page = SolutionPage::findOrFail($pageId);
        $item = SolutionBlock::findOrFail($id);
        return view('admin.solution-blocks.form', compact('page', 'item'));
    }

    public function update(Request $request, string $pageId, string $id)
    {
        $page = SolutionPage::findOrFail($pageId);
        $item = SolutionBlock::findOrFail($id);
        $data = $this->extract($request);
        $item->update($data);
        return redirect()->route('admin.solution-blocks.index', ['page' => $page->id, 'type' => $data['block_type']])->with('status', 'Item updated.');
    }

    public function destroy(string $pageId, string $id)
    {
        $item = SolutionBlock::findOrFail($id);
        $type = $item->block_type;
        $item->delete();
        return redirect()->route('admin.solution-blocks.index', ['page' => $pageId, 'type' => $type])->with('status', 'Item deleted.');
    }

    private function extract(Request $request): array
    {
        $data = $request->validate([
            'block_type'  => 'required|in:capability,usecase,industry,deliverable',
            'number'      => 'nullable|integer',
            'title_en'    => 'required|string|max:255',
            'title_de'    => 'nullable|string|max:255',
            'title_ar'    => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'sort_order'  => 'nullable|integer',
        ]);
        $data['is_visible'] = $request->boolean('is_visible', true);
        $data['bullets_en'] = $this->linesToArray($request->input('bullets_en_text'));
        $data['bullets_de'] = $this->linesToArray($request->input('bullets_de_text'));
        $data['bullets_ar'] = $this->linesToArray($request->input('bullets_ar_text'));
        return $data;
    }

    private function linesToArray(?string $text): array
    {
        if (!$text) return [];
        return collect(explode("\n", $text))->map(fn ($l) => trim($l))->filter()->values()->all();
    }
}
