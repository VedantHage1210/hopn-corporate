<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $items = Program::orderBy('id', 'asc')->paginate(15);
        return view('admin.programs.index', compact('items'));
    }

    public function create()
    {
        $item = new Program();
        return view('admin.programs.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en'       => ['required', 'string', 'max:255'],
            'title_de'       => ['nullable', 'string', 'max:255'],
            'title_ar'       => ['nullable', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:programs,slug'],
            'summary_en'     => ['nullable', 'string'],
            'summary_de'     => ['nullable', 'string'],
            'summary_ar'     => ['nullable', 'string'],
            'audience_en'    => ['nullable', 'string'],
            'audience_de'    => ['nullable', 'string'],
            'audience_ar'    => ['nullable', 'string'],
            'duration'       => ['nullable', 'string', 'max:255'],
            'duration_weeks' => ['nullable', 'integer'],
            'image_url'      => ['nullable', 'url', 'max:500'],
            'cta_label_en'   => ['nullable', 'string', 'max:100'],
            'cta_label_de'   => ['nullable', 'string', 'max:100'],
            'cta_label_ar'   => ['nullable', 'string', 'max:100'],
            'cta_url'        => ['nullable', 'string', 'max:500'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->filled('image_url')) {
            $data['image_url'] = $request->image_url;
        }

        Program::create($data);
        return redirect()->route('admin.programs.index')->with('status', 'Program created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.programs.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Program::findOrFail($id);
        return view('admin.programs.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = Program::findOrFail($id);
        $data = $request->validate([
            'title_en'       => ['required', 'string', 'max:255'],
            'title_de'       => ['nullable', 'string', 'max:255'],
            'title_ar'       => ['nullable', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:programs,slug,'.$item->id],
            'summary_en'     => ['nullable', 'string'],
            'summary_de'     => ['nullable', 'string'],
            'summary_ar'     => ['nullable', 'string'],
            'audience_en'    => ['nullable', 'string'],
            'audience_de'    => ['nullable', 'string'],
            'audience_ar'    => ['nullable', 'string'],
            'duration'       => ['nullable', 'string', 'max:255'],
            'duration_weeks' => ['nullable', 'integer'],
            'image_url'      => ['nullable', 'url', 'max:500'],
            'cta_label_en'   => ['nullable', 'string', 'max:100'],
            'cta_label_de'   => ['nullable', 'string', 'max:100'],
            'cta_label_ar'   => ['nullable', 'string', 'max:100'],
            'cta_url'        => ['nullable', 'string', 'max:500'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title_en']);
        $data['is_published'] = $request->boolean('is_published');

        $item->update($data);
        return redirect()->route('admin.programs.index')->with('status', 'Program updated.');
    }

    public function destroy(string $id)
    {
        Program::findOrFail($id)->delete();
        return redirect()->route('admin.programs.index')->with('status', 'Program deleted.');
    }
}
