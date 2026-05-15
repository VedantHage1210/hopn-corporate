<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerInquiryFormRequest;
use App\Http\Requests\RequestProposalFormRequest;
use App\Http\Requests\TrainingApplicationFormRequest;
use App\Services\LeadService;
use Illuminate\Http\Request;

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

    public function eventRegistration(Request $request, string $lang)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'gdpr_consent' => 'required|accepted',
        ]);

        $this->leadService->store([
            'name'           => $request->first_name . ' ' . $request->last_name,
            'email'          => $request->email,
            'company'        => $request->company,
            'event_interest' => $request->event_interest,
            'message'        => $request->message,
            'gdpr_consent'   => true,
        ], 'event-registration', $request);

        return back()->with('event_success', 'Thank you! Your registration has been received.');
    }

    public function startupApplication(Request $request, string $lang)
    {
        $request->validate([
            'founder_name'  => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'startup_name'  => 'required|string|max:255',
            'gdpr_consent'  => 'required|accepted',
        ]);

        $this->leadService->store([
            'name'          => $request->founder_name,
            'email'         => $request->email,
            'company'       => $request->startup_name,
            'industry'      => $request->industry,
            'stage'         => $request->stage,
            'message'       => $request->message,
            'gdpr_consent'  => true,
        ], 'startup-application', $request);

        return back()->with('startup_success', 'Thank you! Your startup application has been received.');
    }
}
