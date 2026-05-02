<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        $items = Job::latest()->paginate(config('hopn.pagination.default', 15));
        return view('admin.jobs.index', compact('items'));
    }

    public function create()
    {
        $item = new Job();
        return view('admin.jobs.form', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:jobs,slug'],
            'location'       => ['nullable', 'string', 'max:255'],
            'type'           => ['nullable', 'string', 'max:50'],
            'department'     => ['nullable', 'string', 'max:255'],
            'seniority'      => ['nullable', 'string', 'max:100'],
            'description'    => ['nullable', 'string'],
            'description_de' => ['nullable', 'string'],
            'requirements'   => ['nullable', 'string'],
            'requirements_de'=> ['nullable', 'string'],
            'benefits'       => ['nullable', 'string'],
            'benefits_de'    => ['nullable', 'string'],
            'published_at'   => ['nullable', 'date'],
            'close_date'     => ['nullable', 'date'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title']);
        $data['is_active']    = $request->boolean('is_active', true);
        $data['is_published'] = $request->boolean('is_published');

        Job::create($data);
        return redirect()->route('admin.jobs.index')->with('status', 'Job created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.jobs.edit', $id);
    }

    public function edit(string $id)
    {
        $item = Job::findOrFail($id);
        return view('admin.jobs.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $job  = Job::findOrFail($id);
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255', 'unique:jobs,slug,' . $job->id],
            'location'       => ['nullable', 'string', 'max:255'],
            'type'           => ['nullable', 'string', 'max:50'],
            'department'     => ['nullable', 'string', 'max:255'],
            'seniority'      => ['nullable', 'string', 'max:100'],
            'description'    => ['nullable', 'string'],
            'description_de' => ['nullable', 'string'],
            'requirements'   => ['nullable', 'string'],
            'requirements_de'=> ['nullable', 'string'],
            'benefits'       => ['nullable', 'string'],
            'benefits_de'    => ['nullable', 'string'],
            'published_at'   => ['nullable', 'date'],
            'close_date'     => ['nullable', 'date'],
        ]);

        $data['slug']         = $data['slug'] ?: Str::slug($data['title']);
        $data['is_active']    = $request->boolean('is_active');
        $data['is_published'] = $request->boolean('is_published');

        $job->update($data);
        return redirect()->route('admin.jobs.index')->with('status', 'Job updated.');
    }

    public function destroy(string $id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('admin.jobs.index')->with('status', 'Job deleted.');
    }
}
