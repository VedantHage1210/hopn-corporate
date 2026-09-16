<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertAvailability;
use Illuminate\Http\Request;

class ExpertAvailabilityController extends Controller
{
    public function index(Expert $expert)
    {
        $slots = $expert->availabilities()->orderBy('weekday')->get();
        return view('admin.experts.availability', compact('expert', 'slots'));
    }

    public function store(Request $request, Expert $expert)
    {
        $data = $request->validate([
            'weekday'    => ['required', 'integer', 'between:0,6'],
            'start_time' => ['required'],
            'end_time'   => ['required', 'after:start_time'],
        ]);
        $data['expert_id'] = $expert->id;
        $data['is_active'] = true;
        ExpertAvailability::create($data);
        return back()->with('status', 'Availability slot added.');
    }

    public function destroy(Expert $expert, ExpertAvailability $availability)
    {
        $availability->delete();
        return back()->with('status', 'Availability slot removed.');
    }
}
