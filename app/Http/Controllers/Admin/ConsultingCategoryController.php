<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ConsultingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConsultingCategoryController extends Controller
{
    public function index()
    {
        $items = ConsultingCategory::orderBy('sort_order')->paginate(20);
        return view('admin.consulting-categories.index', compact('items'));
    }

    public function create()
    {
        $item = new ConsultingCategory();
        return view('admin.consulting-categories.form', compact('item'));
    }

    protected function rules(?ConsultingCategory $item = null): array
    {
        $slugUnique = 'unique:consulting_categories,slug' . ($item ? ',' . $item->id : '');
        return [
            'name_en'         => ['required', 'string', 'max:255'],
            'name_de'         => ['nullable', 'string', 'max:255'],
            'name_ar'         => ['nullable', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255', $slugUnique],
            'description_en'  => ['nullable', 'string', 'max:500'],
            'description_de'  => ['nullable', 'string', 'max:500'],
            'description_ar'  => ['nullable', 'string', 'max:500'],
            'icon'            => ['nullable', 'string', 'max:100'],
            'accent_color'    => ['nullable', 'string', 'max:20'],
            'sort_order'      => ['nullable', 'integer'],
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['is_visible'] = $request->boolean('is_visible');
        ConsultingCategory::create($data);
        return redirect()->route('admin.consulting-categories.index')->with('status', 'Category created.');
    }

    public function edit(string $id)
    {
        $item = ConsultingCategory::findOrFail($id);
        return view('admin.consulting-categories.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = ConsultingCategory::findOrFail($id);
        $data = $request->validate($this->rules($item));
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['is_visible'] = $request->boolean('is_visible');
        $item->update($data);
        return redirect()->route('admin.consulting-categories.index')->with('status', 'Category updated.');
    }

    public function destroy(string $id)
    {
        ConsultingCategory::findOrFail($id)->delete();
        return redirect()->route('admin.consulting-categories.index')->with('status', 'Category deleted.');
    }
}
