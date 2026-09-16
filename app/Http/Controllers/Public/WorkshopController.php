<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopBooking;
use App\Models\Lead;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index(Request $request, string $lang = 'en')
    {
        $query = Workshop::query()->published()->orderBy('sort_order')->orderBy('id', 'desc');

        if ($category = $request->query('category')) {
            $query->where('category', $category);
        }
        if ($format = $request->query('format')) {
            $query->where('format', $format);
        }

        $workshops  = $query->paginate(9)->withQueryString();
        $categories = Workshop::published()->whereNotNull('category')->distinct()->pluck('category');

        return view('public.workshops.index', compact('workshops', 'categories'));
    }

    public function show(string $lang, string $slug)
    {
        $workshop = Workshop::query()->where('slug', $slug)->published()->firstOrFail();
        $related  = Workshop::query()->published()
            ->where('id', '!=', $workshop->id)
            ->when($workshop->category, fn ($q) => $q->where('category', $workshop->category))
            ->limit(3)->get();

        return view('public.workshops.show', compact('workshop', 'related'));
    }

    public function book(string $lang, string $slug)
    {
        $workshop = Workshop::query()->where('slug', $slug)->published()->firstOrFail();

        return view('public.workshops.book', compact('workshop'));
    }

    public function storeBooking(Request $request, string $lang, string $slug)
    {
        $workshop = Workshop::query()->where('slug', $slug)->published()->firstOrFail();

        $data = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:50'],
            'company'          => ['nullable', 'string', 'max:255'],
            'participants'     => ['nullable', 'integer', 'min:1', 'max:500'],
            'preferred_format' => ['nullable', 'in:on_site,remote,hybrid'],
            'preferred_date'   => ['nullable', 'date'],
            'message'          => ['nullable', 'string', 'max:2000'],
        ]);

        $data['workshop_id']  = $workshop->id;
        $data['participants'] = $data['participants'] ?? 1;
        $data['source_url']   = $request->headers->get('referer');
        $data['utm_source']   = $request->query('utm_source', session('utm_source'));
        $data['utm_medium']   = $request->query('utm_medium', session('utm_medium'));
        $data['utm_campaign'] = $request->query('utm_campaign', session('utm_campaign'));

        $booking = WorkshopBooking::create($data);

        // Also create a Lead record so this shows up in the CRM
        // (Admin → Leads and the Dashboard), matching the same pattern
        // used for career applications and other form types.
        Lead::create([
            'type'         => 'workshop-booking: ' . $workshop->title_en,
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone'        => $data['phone'] ?? null,
            'company'      => $data['company'] ?? null,
            'message'      => "Workshop: {$workshop->title_en}\n"
                             . "Participants: {$data['participants']}\n"
                             . 'Preferred format: ' . ($data['preferred_format'] ?? 'Not specified') . "\n"
                             . 'Preferred date: ' . ($data['preferred_date'] ?? 'Not specified')
                             . ($data['message'] ? "\n\nNote: " . $data['message'] : ''),
            'source_url'   => $data['source_url'],
            'utm_source'   => $data['utm_source'],
            'utm_medium'   => $data['utm_medium'],
            'utm_campaign' => $data['utm_campaign'],
            'status'       => 'new',
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Your workshop booking request has been received!']);
        }

        return redirect()
            ->route('workshops.show', ['lang' => $lang, 'slug' => $workshop->slug])
            ->with('status', 'Thanks — your booking request has been received. Our team will reach out shortly.');
    }
}
