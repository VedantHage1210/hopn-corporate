public function index(Request $request)
{
    $query = Lead::with('assignedUser')->latest();

    if ($request->filled('type')) {
        // Event registration ke saare subtypes filter karne ke liye
        if ($request->type === 'event-registration') {
            $query->where('type', 'like', 'event-registration%');
        } elseif ($request->type === 'startup-application') {
            $query->where('type', 'startup-application');
        } elseif ($request->type === 'career-application') {
            $query->where('type', 'like', '%career%')->orWhere('type', 'like', '%career-application%');
        } else {
            $query->where('type', $request->type);
        }
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
