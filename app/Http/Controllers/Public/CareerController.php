<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerApplicationFormRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = Job::where('is_active', true)
            ->where('is_published', true)
            ->orderBy('id', 'desc')
            ->paginate(config('hopn.pagination.default', 15));
        return view('public.careers.index', compact('jobs'));
    }

    public function show(string $lang, string $slug)
    {
        $job = Job::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('public.careers.show', compact('job'));
    }

    public function apply(CareerApplicationFormRequest $request, string $lang, string $slug)
    {
        $job  = Job::where('slug', $slug)->firstOrFail();
        $data = $request->validated();

        $cvPath = $request->file('cv')->store('career-cv', 'public');

        $token = Str::upper(Str::random(4)) . '-' . Str::upper(Str::random(4));

        JobApplication::create([
            'job_id'         => $job->id,
            'full_name'      => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'] ?? null,
            'cover_letter'   => $data['cover_letter'] ?? null,
            'cv_path'        => $cvPath,
            'status'         => 'new',
            'tracking_token' => $token,
        ]);

        return back()->with([
            'status'         => 'Your application has been submitted successfully!',
            'tracking_token' => $token,
        ]);
    }

   public function track(string $lang, string $token)
{
    $application = JobApplication::where('tracking_token', $token)
        ->with('job')
        ->firstOrFail();
    return view('public.careers.track', compact('application'));
}
}
