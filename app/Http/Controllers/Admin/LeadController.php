<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with('assignedUser')->latest();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $leads = $query->paginate(config('hopn.pagination.leads', 20))->withQueryString();
        $users = User::orderBy('name')->get();

        return view('admin.leads.index', compact('leads', 'users'));
    }

    public function show(Lead $lead)
    {
        $users = User::orderBy('name')->get();

        return view('admin.leads.show', compact('lead', 'users'));
    }

    public function edit(Lead $lead)
    {
        $users = User::orderBy('name')->get();

        return view('admin.leads.show', compact('lead', 'users'));
    }

    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'status'      => ['required', 'string', 'max:50'],
            'notes'       => ['nullable', 'string', 'max:5000'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $lead->update($data);

        return back()->with('status', 'Lead updated successfully.');
    }

    public function export(Request $request): StreamedResponse
    {
        $query = Lead::latest();

        if ($request->filled('type'))   { $query->where('type', $request->type); }
        if ($request->filled('status')) { $query->where('status', $request->status); }

        $leads = $query->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="hopn-leads-' . now()->format('Y-m-d') . '.csv"',
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['ID', 'Type', 'Name', 'Email', 'Phone', 'Company', 'Status', 'Source URL', 'UTM Source', 'UTM Medium', 'UTM Campaign', 'Date']);

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->type,
                    $lead->name,
                    $lead->email,
                    $lead->phone,
                    $lead->company,
                    $lead->status,
                    $lead->source_url,
                    $lead->utm_source,
                    $lead->utm_medium,
                    $lead->utm_campaign,
                    $lead->created_at->format('Y-m-d H:i'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }
}
