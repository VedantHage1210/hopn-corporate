<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseStudyController extends Controller
{
    public function index()
    {
        return view('admin.case-studies.index', [
            'items' => CaseStudy::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        $item       = new CaseStudy();
        $industries = Industry::orderBy('name')->get();
        $services   = Service::orderBy('name')->get();
        return view('admin.case-studies.form', compact('item', 'industries', 'services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en'       => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:case_studies,slug'],
            'title_de'       => ['nullable', 'string'],
            'title_ar'       => ['nullable', 'string'],
            'client_name_en' => ['nullable', 'string'],
            'client_name_de' => ['nullable', 'string'],
            'client_name_ar' => ['nullable', 'string'],
            'challenge_en'   => ['nullable', 'string'],
            'challenge_de'   => ['nullable', 'string'],
            'challenge_ar'   => ['nullable', 'string'],
            'solution_en'    => ['nullable', 'string'],
            'solution_de'    => ['nullable', 'string'],
            'solution_ar'    => ['nullable', 'string'],
            'outcomes_en'    => ['nullable', 'string'],
            'outcomes_de'    => ['nullable', 'string'],
            'outcomes_ar'    => ['nullable', 'string'],
            'tech_stack'     => ['nullable', 'string'],
            'image_url'      => ['nullable', 'url'],
            'pdf_url'        => ['nullable', 'url'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');
        $data['industry_ids'] = $request->industry_ids ?? [];
        $data['service_ids']  = $request->service_ids ?? [];

        CaseStudy::create($data);
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.case-studies.edit', $id);
    }

  public function edit(string $id)

    {

        $item       = CaseStudy::findOrFail($id);

        $industries = Industry::orderBy('name')->get();

        $services   = Service::orderBy('name')->get();

        return view('admin.case-studies.form', compact('item', 'industries', 'services'));

    }
    public function update(Request $request, string $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        $data = $request->validate([
            'title_en'       => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:case_studies,slug,'.$caseStudy->id],
            'title_de'       => ['nullable', 'string'],
            'title_ar'       => ['nullable', 'string'],
            'client_name_en' => ['nullable', 'string'],
            'client_name_de' => ['nullable', 'string'],
            'client_name_ar' => ['nullable', 'string'],
            'challenge_en'   => ['nullable', 'string'],
            'challenge_de'   => ['nullable', 'string'],
            'challenge_ar'   => ['nullable', 'string'],
            'solution_en'    => ['nullable', 'string'],
            'solution_de'    => ['nullable', 'string'],
            'solution_ar'    => ['nullable', 'string'],
            'outcomes_en'    => ['nullable', 'string'],
            'outcomes_de'    => ['nullable', 'string'],
            'outcomes_ar'    => ['nullable', 'string'],
            'tech_stack'     => ['nullable', 'string'],
            'image_url'      => ['nullable', 'url'],
            'pdf_url'        => ['nullable', 'url'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');
        $data['industry_ids'] = $request->industry_ids ?? [];
        $data['service_ids']  = $request->service_ids ?? [];

        $caseStudy->update($data);
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study updated successfully.');
    }

    public function destroy(string $id)
    {
        CaseStudy::findOrFail($id)->delete();
        return redirect()->route('admin.case-studies.index')->with('status', 'Case study deleted.');
    }
}
