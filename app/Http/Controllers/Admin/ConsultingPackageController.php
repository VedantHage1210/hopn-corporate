<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ConsultingPackage;
use App\Models\ConsultingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConsultingPackageController extends Controller
{
    public function index()
    {
        $items = ConsultingPackage::with('category')->orderBy('sort_order')->paginate(20);
        return view('admin.consulting-packages.index', compact('items'));
    }

    public function create()
    {
        $item = new ConsultingPackage();
        $categories = ConsultingCategory::orderBy('name_en')->get();
        return view('admin.consulting-packages.form', compact('item', 'categories'));
    }

    protected function rules(?ConsultingPackage $item = null): array
    {
        $slugUnique = 'unique:consulting_packages,slug' . ($item ? ',' . $item->id : '');
        return [
            'consulting_category_id' => ['nullable', 'exists:consulting_categories,id'],
            'name_en'                => ['required', 'string', 'max:255'],
            'name_de'                => ['nullable', 'string', 'max:255'],
            'name_ar'                => ['nullable', 'string', 'max:255'],
            'slug'                   => ['nullable', 'string', 'max:255', $slugUnique],
            'description_en'         => ['nullable', 'string'],
            'description_de'         => ['nullable', 'string'],
            'description_ar'         => ['nullable', 'string'],
            'duration_minutes'       => ['required', 'integer', 'min:15'],
            'price'                  => ['nullable', 'numeric', 'min:0'],
            'currency'               => ['nullable', 'string', 'max:3'],
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['currency'] = $data['currency'] ?: 'EUR';
        $data['price_on_request'] = $request->boolean('price_on_request');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_visible'] = $request->boolean('is_visible');
        $data['inclusions_en'] = $this->linesToArray($request->input('inclusions_en_text'));
        $data['inclusions_de'] = $this->linesToArray($request->input('inclusions_de_text'));
        $data['inclusions_ar'] = $this->linesToArray($request->input('inclusions_ar_text'));
        ConsultingPackage::create($data);
        return redirect()->route('admin.consulting-packages.index')->with('status', 'Package created.');
    }

    public function edit(string $id)
    {
        $item = ConsultingPackage::findOrFail($id);
        $categories = ConsultingCategory::orderBy('name_en')->get();
        return view('admin.consulting-packages.form', compact('item', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $item = ConsultingPackage::findOrFail($id);
        $data = $request->validate($this->rules($item));
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['currency'] = $data['currency'] ?: 'EUR';
        $data['price_on_request'] = $request->boolean('price_on_request');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_visible'] = $request->boolean('is_visible');
        $data['inclusions_en'] = $this->linesToArray($request->input('inclusions_en_text'));
        $data['inclusions_de'] = $this->linesToArray($request->input('inclusions_de_text'));
        $data['inclusions_ar'] = $this->linesToArray($request->input('inclusions_ar_text'));
        $item->update($data);
        return redirect()->route('admin.consulting-packages.index')->with('status', 'Package updated.');
    }

    public function destroy(string $id)
    {
        ConsultingPackage::findOrFail($id)->delete();
        return redirect()->route('admin.consulting-packages.index')->with('status', 'Package deleted.');
    }

    private function linesToArray(?string $text): array
    {
        if (!$text) return [];
        return collect(explode("\n", $text))->map(fn ($l) => trim($l))->filter()->values()->all();
    }
}
