<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchPublication;
use Illuminate\Http\Request;

class ResearchPublicationController extends Controller
{
    public function index()
    {
        $items = ResearchPublication::orderBy('sort_order')->paginate(20);
        return view('admin.research-publications.index', compact('items'));
    }

    public function create()
    {
        return view('admin.research-publications.form', ['item' => new ResearchPublication()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        ResearchPublication::create($data);
        return redirect()->route('admin.research-publications.index')->with('status', 'Publication created.');
    }

    public function edit(ResearchPublication $researchPublication)
    {
        return view('admin.research-publications.form', ['item' => $researchPublication]);
    }

    public function update(Request $request, ResearchPublication $researchPublication)
    {
        $data = $this->validateData($request);
        $researchPublication->update($data);
        return redirect()->route('admin.research-publications.index')->with('status', 'Publication updated.');
    }

    public function destroy(ResearchPublication $researchPublication)
    {
        $researchPublication->delete();
        return redirect()->route('admin.research-publications.index')->with('status', 'Publication deleted.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'title_en'     => ['required', 'string', 'max:255'],
            'title_de'     => ['nullable', 'string', 'max:255'],
            'title_ar'     => ['nullable', 'string', 'max:255'],
            'project'      => ['nullable', 'string', 'max:100'],
            'authors'      => ['nullable', 'string', 'max:255'],
            'summary_en'   => ['nullable', 'string', 'max:2000'],
            'summary_de'   => ['nullable', 'string', 'max:2000'],
            'summary_ar'   => ['nullable', 'string', 'max:2000'],
            'published_on' => ['nullable', 'date'],
            'pdf_url'      => ['nullable', 'url', 'max:500'],
            'external_url' => ['nullable', 'url', 'max:500'],
            'sort_order'   => ['nullable', 'integer'],
        ]);

        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }
}
