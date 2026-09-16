<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PlatformApp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlatformAppController extends Controller
{
    public function index()
    {
        $items = PlatformApp::orderBy('sort_order')->paginate(20);
        return view('admin.platform-apps.index', compact('items'));
    }

    public function create()
    {
        $item = new PlatformApp();
        return view('admin.platform-apps.form', compact('item'));
    }

    protected function rules(?PlatformApp $item = null): array
    {
        $slugUnique = 'unique:platform_apps,slug' . ($item ? ',' . $item->id : '');
        return [
            'name_en'         => ['required', 'string', 'max:255'],
            'name_de'         => ['nullable', 'string', 'max:255'],
            'name_ar'         => ['nullable', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255', $slugUnique],
            'tagline_en'      => ['nullable', 'string', 'max:255'],
            'tagline_de'      => ['nullable', 'string', 'max:255'],
            'tagline_ar'      => ['nullable', 'string', 'max:255'],
            'description_en'  => ['nullable', 'string'],
            'description_de'  => ['nullable', 'string'],
            'description_ar'  => ['nullable', 'string'],
            'logo_url'        => ['nullable', 'string', 'max:500'],
            'external_url'    => ['nullable', 'string', 'max:500'],
            'cta_label_en'    => ['nullable', 'string', 'max:255'],
            'cta_label_de'    => ['nullable', 'string', 'max:255'],
            'cta_label_ar'    => ['nullable', 'string', 'max:255'],
            'sort_order'      => ['nullable', 'integer'],
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['is_visible'] = $request->boolean('is_visible');
        PlatformApp::create($data);
        return redirect()->route('admin.platform-apps.index')->with('status', 'App created.');
    }

    public function edit(string $id)
    {
        $item = PlatformApp::findOrFail($id);
        return view('admin.platform-apps.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = PlatformApp::findOrFail($id);
        $data = $request->validate($this->rules($item));
        $data['slug'] = $data['slug'] ?: Str::slug($data['name_en']);
        $data['is_visible'] = $request->boolean('is_visible');
        $item->update($data);
        return redirect()->route('admin.platform-apps.index')->with('status', 'App updated.');
    }

    public function destroy(string $id)
    {
        PlatformApp::findOrFail($id)->delete();
        return redirect()->route('admin.platform-apps.index')->with('status', 'App deleted.');
    }
}
