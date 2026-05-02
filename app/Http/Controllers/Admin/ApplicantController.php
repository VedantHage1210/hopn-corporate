<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with('job')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        $applicants = $query->paginate(config('hopn.pagination.default', 20));

        return view('admin.applicants.index', compact('applicants'));
    }

    public function show(JobApplication $applicant)
    {
        $applicant->load('job');

        return view('admin.applicants.show', compact('applicant'));
    }

    public function update(Request $request, JobApplication $applicant)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,reviewed,interview,offer,rejected'],
            'notes'  => ['nullable', 'string', 'max:5000'],
        ]);

        $applicant->update($data);

        return back()->with('status', 'Applicant status updated.');
    }

    public function destroy(JobApplication $applicant)
    {
        $applicant->delete();

        return redirect()->route('admin.applicants.index')->with('status', 'Applicant record deleted.');
    }
}
