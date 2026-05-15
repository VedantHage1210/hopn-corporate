<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $items = Event::orderBy('date')->paginate(20);
        return view('admin.events.index', compact('items'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        Event::create([
            'title'             => $request->title,
            'title_de'          => $request->title_de,
            'title_ar'          => $request->title_ar,
            'type'              => $request->type,
            'date'              => $request->date,
            'location'          => $request->location,
            'registration_url'  => $request->registration_url,
            'max_attendees'     => $request->max_attendees,
            'description'       => $request->description,
            'description_de'    => $request->description_de,
            'description_ar'    => $request->description_ar,
            'speaker_names'     => $request->speaker_names,
            'sponsor_names'     => $request->sponsor_names,
            'image_url'         => $request->image_url,
            'is_published'      => $request->has('is_published'),
            'registration_open' => $request->has('registration_open'),
            'sort_order'        => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.events.index')->with('status', 'Event added!');
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
        $event->update([
            'title'             => $request->title,
            'title_de'          => $request->title_de,
            'title_ar'          => $request->title_ar,
            'type'              => $request->type,
            'date'              => $request->date,
            'location'          => $request->location,
            'registration_url'  => $request->registration_url,
            'max_attendees'     => $request->max_attendees,
            'description'       => $request->description,
            'description_de'    => $request->description_de,
            'description_ar'    => $request->description_ar,
            'speaker_names'     => $request->speaker_names,
            'sponsor_names'     => $request->sponsor_names,
            'image_url'         => $request->image_url,
            'is_published'      => $request->has('is_published'),
            'registration_open' => $request->has('registration_open'),
            'sort_order'        => $request->sort_order ?? 0,
        ]);
        return redirect()->route('admin.events.index')->with('status', 'Event updated!');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.events.index')->with('status', 'Event deleted.');
    }

    public function show($id)
    {
        return redirect()->route('admin.events.index');
    }
}
