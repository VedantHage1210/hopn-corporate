<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $lang   = request()->route('lang', 'en');
        $events = Event::where('is_published', true)
                       ->orderBy('date')
                       ->get();
        return view('public.events.index', compact('events', 'lang'));
    }

    public function show(string $lang, string $event)
    {
        $query = Event::where('is_published', true);

        $found = Event::hasSlugColumn() ? (clone $query)->where('slug', $event)->first() : null;

        // Old numeric links (/events/7) keep working and forward to the readable URL.
        if (!$found && ctype_digit($event)) {
            $found = (clone $query)->find((int) $event);
            if ($found && Event::hasSlugColumn() && $found->slug) {
                return redirect()->route('events.show', ['lang' => $lang, 'event' => $found->slug], 301);
            }
        }

        abort_unless($found, 404);
        $event = $found;

        return view('public.events.show', compact('event', 'lang'));
    }
}