<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerApplicationFormRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class CareerController extends Controller
{
    public function index()
    {
        $lang = request()->route('lang', 'en');
        $jobs = Job::where('is_active', true)
                   ->where('is_published', true)
                   ->orderBy('id', 'desc')
                   ->paginate(config('hopn.pagination.default', 15));
        return view('public.careers.index', compact('jobs', 'lang'));
    }

    public function show(string $lang, string $slug)
    {
        $job = Job::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('public.careers.show', compact('job', 'lang'));
    }

    public function apply(CareerApplicationFormRequest $request, string $lang, string $slug)
    {
        $job  = Job::where('slug', $slug)->firstOrFail();
        $data = $request->validated();

        // Cloudinary pe upload — Railway local storage ephemeral hai
        $cvPath = $this->uploadToCloudinary($request->file('cv'));

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

  private function uploadToCloudinary($file): ?string
{
    try {
        $cloudName = config('cloudinary.cloud_name', env('CLOUDINARY_CLOUD_NAME', 'diz1kld4g'));
        $apiKey    = config('cloudinary.api_key', env('CLOUDINARY_API_KEY', '995583962582514'));
        $apiSecret = config('cloudinary.api_secret', env('CLOUDINARY_API_SECRET'));
        $timestamp = time();

        // resource_type=raw for PDFs/DOCs
        $paramsToSign = "folder=hopn-cv&resource_type=raw&timestamp={$timestamp}";
        $signature    = sha1($paramsToSign . $apiSecret);

        $response = \Illuminate\Support\Facades\Http::timeout(30)->attach(
            'file',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/raw/upload", [
            'api_key'       => $apiKey,
            'timestamp'     => $timestamp,
            'signature'     => $signature,
            'folder'        => 'hopn-cv',
            'resource_type' => 'raw',
        ]);

        if ($response->successful()) {
            return $response->json()['secure_url'];
        }

        \Illuminate\Support\Facades\Log::error('Cloudinary upload failed: ' . $response->body());
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Cloudinary CV upload exception: ' . $e->getMessage());
    }

    return $file->store('career-cv', 'public');
}
    public function track(string $lang, string $token)
    {
        $application = JobApplication::where('tracking_token', $token)
                                     ->with('job')
                                     ->firstOrFail();
        return view('public.careers.track', compact('application', 'lang'));
    }
}
