<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SolutionPage;
use Illuminate\Http\Request;

class SolutionPageController extends Controller
{
    public function index()
    {
        $items = SolutionPage::orderBy('id')->get();
        return view('admin.solution-pages.index', compact('items'));
    }

    public function edit(string $id)
    {
        $item = SolutionPage::findOrFail($id);
        return view('admin.solution-pages.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = SolutionPage::findOrFail($id);

        $fields = [
            'nav_label', 'hero_eyebrow', 'hero_title', 'hero_subtitle', 'hero_note',
            'cta1_label', 'cta2_label',
            'capabilities_eyebrow', 'capabilities_title', 'capabilities_subtitle',
            'usecases_eyebrow', 'usecases_title',
            'industries_eyebrow', 'industries_title', 'industries_subtitle',
            'deliverables_title',
            'final_eyebrow', 'final_title', 'final_subtitle', 'final_cta1_label', 'final_cta2_label',
        ];

        $data = [];
        foreach ($fields as $field) {
            foreach (['en', 'de', 'ar'] as $lang) {
                $data["{$field}_{$lang}"] = $request->input("{$field}_{$lang}");
            }
        }
        $data['cta1_url'] = $request->input('cta1_url');
        $data['cta2_url'] = $request->input('cta2_url');
        $data['final_cta1_url'] = $request->input('final_cta1_url');
        $data['final_cta2_url'] = $request->input('final_cta2_url');
        $data['is_published'] = $request->boolean('is_published');

        $item->update($data);

        return redirect()->route('admin.solution-pages.edit', $item->id)->with('status', 'Page content updated.');
    }
}
