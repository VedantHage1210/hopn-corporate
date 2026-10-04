<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicPartner;
use Illuminate\Http\Request;

class AcademicPartnerController extends Controller
{
    public function index()
    {
        $items = AcademicPartner::orderBy('sort_order')->get();
        return view('admin.academic-partners.index', compact('items'));
    }

    public function create()
    {
        return view('admin.academic-partners.form', ['item' => new AcademicPartner()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        AcademicPartner::create($data);
        return redirect()->route('admin.academic-partners.index')->with('status', 'Academic partner created.');
    }

    public function edit(AcademicPartner $academicPartner)
    {
        return view('admin.academic-partners.form', ['item' => $academicPartner]);
    }

    public function update(Request $request, AcademicPartner $academicPartner)
    {
        $data = $this->validateData($request);
        $academicPartner->update($data);
        return redirect()->route('admin.academic-partners.index')->with('status', 'Academic partner updated.');
    }

    public function destroy(AcademicPartner $academicPartner)
    {
        $academicPartner->delete();
        return redirect()->route('admin.academic-partners.index')->with('status', 'Academic partner deleted.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'logo_url'    => ['nullable', 'url', 'max:500'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'sort_order'  => ['nullable', 'integer'],
        ]);

        $data['is_visible'] = $request->boolean('is_visible');

        return $data;
    }
}
