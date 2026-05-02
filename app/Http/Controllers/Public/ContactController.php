<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Services\LeadService;

class ContactController extends Controller
{
    public function __construct(private LeadService $leadService) {}

    public function index()
    {
        return view('public.contact.index');
    }

    public function submit(ContactFormRequest $request, string $lang)
    {
        $this->leadService->store($request->validated(), 'contact', $request);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Thank you! We will contact you soon.']);
        }

        return back()->with('status', 'Thank you! We will contact you soon.');
    }
}
