<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerInquiryFormRequest;
use App\Http\Requests\RequestProposalFormRequest;
use App\Http\Requests\TrainingApplicationFormRequest;
use App\Services\LeadService;

class LeadController extends Controller
{
    public function __construct(private LeadService $leadService) {}

    public function proposal(RequestProposalFormRequest $request, string $lang)
    {
        $this->leadService->store($request->validated(), 'proposal', $request);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Thank you! We will be in touch shortly.']);
        }

        return back()->with('status', 'Thank you! We will be in touch shortly.');
    }

    public function partnerInquiry(PartnerInquiryFormRequest $request, string $lang)
    {
        $this->leadService->store($request->validated(), 'partner-inquiry', $request);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Thank you for your partner inquiry!']);
        }

        return back()->with('status', 'Thank you for your partner inquiry!');
    }

    public function trainingApplication(TrainingApplicationFormRequest $request, string $lang)
    {
        $this->leadService->store($request->validated(), 'training-application', $request);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Your training application has been received!']);
        }

        return back()->with('status', 'Your training application has been received!');
    }
}
