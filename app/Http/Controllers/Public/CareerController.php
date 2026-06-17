<?php
namespace App\Http\Controllers\Public;
 
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerApplicationFormRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
 
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
 
    public function track(string $lang, string $token)
    {
        // firstOrFail() se 404 aata tha — first() se check karte hain properly
        $application = JobApplication::where('tracking_token', trim($token))
                                     ->with('job')
                                     ->first();
 
        if (! $application) {
            return view('public.careers.track', [
                'application'  => null,
                'lang'         => $lang,
                'error'        => 'No application found with this tracking ID. Please check and try again.',
            ]);
        }
 
        return view('public.careers.track', compact('application', 'lang'));
    }
 
    private function uploadToCloudinary($file): ?string
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME', 'diz1kld4g');
        $apiKey    = env('CLOUDINARY_API_KEY', '995583962582514');
        $apiSecret = env('CLOUDINARY_API_SECRET');
 
        if (! $apiSecret) {
            Log::warning('CLOUDINARY_API_SECRET not set — falling back to local storage');
            return $file->store('career-cv', 'public');
        }
 
        try {
            $timestamp = time();
 
            // Correct Cloudinary signature — parameters alphabetically sorted, NO resource_type in string
            $paramsToSign = "folder=hopn-cv&timestamp={$timestamp}";
            $signature    = sha1($paramsToSign . $apiSecret);
 
            $response = Http::timeout(60)
                ->attach(
                    'file',
                    file_get_contents($file->getRealPath()),
                    $file->getClientOriginalName()
                )
                ->post("https://api.cloudinary.com/v1_1/{$cloudName}/raw/upload", [
                    'api_key'   => $apiKey,
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'folder'    => 'hopn-cv',
                ]);
 
            if ($response->successful() && isset($response->json()['secure_url'])) {
                return $response->json()['secure_url'];
            }
 
            Log::error('Cloudinary upload failed: ' . $response->body());
 
        } catch (\Exception $e) {
            Log::error('Cloudinary exception: ' . $e->getMessage());
        }
 
        // Local fallback
        return $file->store('career-cv', 'public');
    }
}
