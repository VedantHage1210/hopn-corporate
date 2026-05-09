<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $items = Event::latest()->paginate(20);
        return view('admin.events.index', compact('items'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        Event::create($request->only(['title', 'type', 'date', 'location', 'registration_url', 'max_attendees', 'description']));
        return redirect()->route('admin.events.index')->with('status', 'Event added successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate(['title' => 'required|string|max:255']);
        $event->update($request->only(['title', 'type', 'date', 'location', 'registration_url', 'max_attendees', 'description']));
        return redirect()->route('admin.events.index')->with('status', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.events.index')->with('status', 'Event deleted.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }
}
