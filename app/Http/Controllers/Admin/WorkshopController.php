<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopBooking;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkshopController extends Controller
{
    protected function rules(?Workshop $item = null): array
    {
        $slugUnique = 'unique:workshops,slug' . ($item ? ',' . $item->id : '');

        return [
            'title_en'           => ['required', 'string', 'max:255'],
            'title_de'           => ['nullable', 'string', 'max:255'],
            'title_ar'           => ['nullable', 'string', 'max:255'],
            'slug'               => ['nullable', 'string', 'max:255', $slugUnique],
            'tagline_en'         => ['nullable', 'string', 'max:500'],
            'tagline_de'         => ['nullable', 'string', 'max:500'],
            'tagline_ar'         => ['nullable', 'string', 'max:500'],
            'summary_en'         => ['nullable', 'string'],
            'summary_de'         => ['nullable', 'string'],
            'summary_ar'         => ['nullable', 'string'],
            'description_en'     => ['nullable', 'string'],
            'description_de'     => ['nullable', 'string'],
            'description_ar'     => ['nullable', 'string'],
            'format'             => ['required', 'in:on_site,remote,hybrid,bootcamp,executive'],
            'category'           => ['nullable', 'string', 'max:255'],
            'duration_hours'     => ['nullable', 'integer', 'min:0'],
            'duration_label_en'  => ['nullable', 'string', 'max:255'],
            'price'              => ['nullable', 'numeric', 'min:0'],
            'currency'           => ['nullable', 'string', 'max:3'],
            'hero_image_url'     => ['nullable', 'url', 'max:500'],
            'instructor_name'    => ['nullable', 'string', 'max:255'],
            'instructor_bio'     => ['nullable', 'string', 'max:1000'],
            'cta_label_en'       => ['nullable', 'string', 'max:255'],
            'cta_label_de'       => ['nullable', 'string', 'max:255'],
            'cta_label_ar'       => ['nullable', 'string', 'max:255'],
            'seo_title'          => ['nullable', 'string', 'max:255'],
            'seo_description'    => ['nullable', 'string', 'max:500'],
        ];
    }

    public function index()
    {
        $items = Workshop::orderBy('sort_order')->orderBy('id', 'desc')->paginate(15);
        return view('admin.workshops.index', compact('items'));
    }

    public function create()
    {
        $item       = new Workshop();
        $industries = Industry::where('is_published', true)->orderBy('name')->get();
        $services   = Service::orderBy('name')->get();
        return view('admin.workshops.form', compact('item', 'industries', 'services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        $data['slug']              = $data['slug'] ?: Str::slug($data['title_en']);
        $data['currency']          = $data['currency'] ?: 'EUR';
        $data['price_on_request']  = $request->boolean('price_on_request');
        $data['is_published']      = $request->boolean('is_published');
        $data['industry_ids']      = $request->industry_ids ?? [];
        $data['service_ids']       = $request->service_ids ?? [];
        $data['outcomes_en']       = $this->linesToArray($request->input('outcomes_en_text'));
        $data['outcomes_de']       = $this->linesToArray($request->input('outcomes_de_text'));
        $data['outcomes_ar']       = $this->linesToArray($request->input('outcomes_ar_text'));
        if ($data['is_published'] && !$request->filled('published_at')) {
            $data['published_at'] = now();
        }

        Workshop::create($data);
        return redirect()->route('admin.workshops.index')->with('status', 'Workshop created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.workshops.edit', $id);
    }

    public function edit(string $id)
    {
        $item       = Workshop::findOrFail($id);
        $industries = Industry::where('is_published', true)->orderBy('name')->get();
        $services   = Service::orderBy('name')->get();
        return view('admin.workshops.form', compact('item', 'industries', 'services'));
    }

    public function update(Request $request, string $id)
    {
        $item = Workshop::findOrFail($id);
        $data = $request->validate($this->rules($item));

        $data['slug']              = $data['slug'] ?: Str::slug($data['title_en']);
        $data['currency']          = $data['currency'] ?: 'EUR';
        $data['price_on_request']  = $request->boolean('price_on_request');
        $data['is_published']      = $request->boolean('is_published');
        $data['industry_ids']      = $request->industry_ids ?? [];
        $data['service_ids']       = $request->service_ids ?? [];
        $data['outcomes_en']       = $this->linesToArray($request->input('outcomes_en_text'));
        $data['outcomes_de']       = $this->linesToArray($request->input('outcomes_de_text'));
        $data['outcomes_ar']       = $this->linesToArray($request->input('outcomes_ar_text'));
        if ($data['is_published'] && !$item->published_at && !$request->filled('published_at')) {
            $data['published_at'] = now();
        }

        $item->update($data);
        return redirect()->route('admin.workshops.index')->with('status', 'Workshop updated.');
    }

    public function destroy(string $id)
    {
        Workshop::findOrFail($id)->delete();
        return redirect()->route('admin.workshops.index')->with('status', 'Workshop deleted.');
    }

    public function bookings(string $id)
    {
        $item     = Workshop::findOrFail($id);
        $bookings = $item->bookings()->latest()->paginate(20);
        return view('admin.workshops.bookings', compact('item', 'bookings'));
    }

    private function linesToArray(?string $text): array
    {
        if (!$text) return [];
        return collect(explode("\n", $text))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
