<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerApplicationFormRequest;
use App\Models\Job;
use App\Models\Lead;
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

        $token = $this->generateTrackingToken();

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

Lead::create([
    'type'       => 'career-application',
    'name'       => $data['name'],
    'email'      => $data['email'],
    'phone'      => $data['phone'] ?? null,
    'company'    => null,
    'message'    => 'Applied for: ' . $job->title . ($data['cover_letter'] ? "\n\n" . $data['cover_letter'] : ''),
    'source_url' => $request->url(),
    'status'     => 'new',
]);

        \App\Jobs\SendCareerApplicationJob::dispatch([
            'name'            => $data['name'],
            'email'           => $data['email'],
            'phone'           => $data['phone'] ?? null,
            'cover_letter'    => $data['cover_letter'] ?? null,
            'tracking_token'  => $token,
        ], $job->title);

        return back()->with([
            'status'         => 'Your application has been submitted successfully!',
            'tracking_token' => $token,
        ]);
    }

    public function track(string $lang, string $token)
    {
        // Normalize the token the same way it was generated/stored:
        // trim whitespace and force uppercase so case differences
        // (e.g. user pastes lowercase) never cause a false "not found".
        $normalized = Str::upper(trim($token));

        $application = JobApplication::whereRaw('UPPER(tracking_token) = ?', [$normalized])
                                     ->with('job')
                                     ->first();

        if (! $application) {
            return view('public.careers.track', [
                'application' => null,
                'lang'        => $lang,
                'error'       => 'No application found with this tracking ID. Please check and try again.',
            ]);
        }

        return view('public.careers.track', compact('application', 'lang'));
    }

    /**
     * Generate a tracking token using only unambiguous uppercase letters
     * and digits (no 0/O or 1/I confusion), so what the user reads and
     * types back always matches exactly.
     */
    private function generateTrackingToken(): string
    {
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // no 0/O/1/I
        $part = function () use ($alphabet) {
            $out = '';
            for ($i = 0; $i < 4; $i++) {
                $out .= $alphabet[random_int(0, strlen($alphabet) - 1)];
            }
            return $out;
        };

        $token = $part() . '-' . $part();

        // Extremely unlikely, but guard against collisions.
        while (JobApplication::where('tracking_token', $token)->exists()) {
            $token = $part() . '-' . $part();
        }

        return $token;
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

        $stream = null;

        try {
            $timestamp    = time();
            $paramsToSign = "folder=hopn-cv&timestamp={$timestamp}";
            $signature    = sha1($paramsToSign . $apiSecret);

            // IMPORTANT: stream the file with its real Content-Type.
            // The previous version used file_get_contents() with no
            // mime type, which let Cloudinary mis-handle PDF bytes
            // (Word docs happened to still open, PDFs came back corrupt).
            $stream = fopen($file->getRealPath(), 'rb');

            if ($stream === false) {
                throw new \RuntimeException('Could not open uploaded file for reading.');
            }

            $response = Http::timeout(60)
                ->attach(
                    'file',
                    $stream,
                    $file->getClientOriginalName(),
                    ['Content-Type' => $file->getMimeType() ?: 'application/octet-stream']
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
        } finally {
            if (is_resource($stream)) {
                fclose($stream);
            }
        }

        // Local fallback (ephemeral on Railway, but better than losing the file entirely)
        return $file->store('career-cv', 'public');
    }
}
