<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ConsultingBooking;
use App\Models\ConsultingCategory;
use App\Models\ConsultingPackage;
use App\Models\Expert;
use App\Models\Lead;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    public function index(Request $request, string $lang = 'en')
    {
        $categories = ConsultingCategory::visible()->orderBy('sort_order')->get();
        $expertsQuery = Expert::where('is_visible', true)->orderBy('sort_order');

        if ($categorySlug = $request->query('category')) {
            $expertsQuery->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        $experts  = $expertsQuery->get();
        $packages = ConsultingPackage::visible()->orderBy('sort_order')->get();

        return view('public.consulting.index', compact('categories', 'experts', 'packages'));
    }

    public function showExpert(string $lang, string $id)
    {
        $expert = Expert::where('is_visible', true)->findOrFail($id);
        $availabilities = $expert->availabilities()->where('is_active', true)->orderBy('weekday')->get();
        $packages = ConsultingPackage::visible()
            ->when($expert->consulting_category_id, fn ($q) => $q->where('consulting_category_id', $expert->consulting_category_id))
            ->orderBy('sort_order')->get();

        return view('public.consulting.expert', compact('expert', 'availabilities', 'packages'));
    }

    public function book(string $lang, string $id)
    {
        $expert   = Expert::where('is_visible', true)->findOrFail($id);
        $packages = ConsultingPackage::visible()
            ->when($expert->consulting_category_id, fn ($q) => $q->where('consulting_category_id', $expert->consulting_category_id))
            ->orderBy('sort_order')->get();

        return view('public.consulting.book', compact('expert', 'packages'));
    }

    public function storeBooking(Request $request, string $lang, string $id)
    {
        $expert = Expert::where('is_visible', true)->findOrFail($id);

        $data = $request->validate([
            'consulting_package_id' => ['nullable', 'exists:consulting_packages,id'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255'],
            'phone'                 => ['nullable', 'string', 'max:50'],
            'company'               => ['nullable', 'string', 'max:255'],
            'preferred_date'        => ['nullable', 'date'],
            'preferred_time_slot'   => ['nullable', 'string', 'max:50'],
            'message'               => ['nullable', 'string', 'max:2000'],
        ]);

        $data['expert_id']    = $expert->id;
        $data['source_url']   = $request->headers->get('referer');
        $data['utm_source']   = $request->query('utm_source', session('utm_source'));
        $data['utm_medium']   = $request->query('utm_medium', session('utm_medium'));
        $data['utm_campaign'] = $request->query('utm_campaign', session('utm_campaign'));

        ConsultingBooking::create($data);

        Lead::create([
            'type'         => 'consulting-booking: ' . $expert->name,
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone'        => $data['phone'] ?? null,
            'company'      => $data['company'] ?? null,
            'message'      => "Expert: {$expert->name}\n"
                             . 'Preferred date: ' . ($data['preferred_date'] ?? 'Not specified') . "\n"
                             . 'Preferred time: ' . ($data['preferred_time_slot'] ?? 'Not specified')
                             . ($data['message'] ? "\n\nNote: " . $data['message'] : ''),
            'source_url'   => $data['source_url'],
            'utm_source'   => $data['utm_source'],
            'utm_medium'   => $data['utm_medium'],
            'utm_campaign' => $data['utm_campaign'],
            'status'       => 'new',
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Your consulting request has been received!']);
        }

        return redirect()
            ->route('consulting.expert', ['lang' => $lang, 'id' => $expert->id])
            ->with('status', 'Thanks — your consulting request has been received. Our team will reach out shortly.');
    }
}
