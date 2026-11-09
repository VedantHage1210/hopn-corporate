<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Streams a locally stored CV (career-cv/…) to a logged-in admin.
     * Works without the `storage:link` symlink, so downloads don't 404.
     */
    public function cv(Request $request)
    {
        $path = ltrim((string) $request->query('path', ''), '/');

        if ($path === '' || str_contains($path, '..') || ! str_starts_with($path, 'career-cv/')) {
            abort(404);
        }

        $disk = \Illuminate\Support\Facades\Storage::disk('public');

        if (! $disk->exists($path)) {
            abort(404, 'This CV file is no longer on the server (local files are lost when the server restarts). '
                . 'Please ask the applicant to resend it. To prevent this, set CLOUDINARY_API_SECRET on the server so CVs are stored permanently.');
        }

        return response()->file($disk->path($path), [
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
            'X-Robots-Tag'        => 'noindex, nofollow',
        ]);
    }

    public function index(Request $request)
    {
        $query = JobApplication::with('job')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->kind === 'general') {
            $query->where('is_general', true);
        } elseif ($request->kind === 'job') {
            $query->where('is_general', false);
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
