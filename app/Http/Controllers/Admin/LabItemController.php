<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LabItem;
use Illuminate\Http\Request;

class LabItemController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'focus_area');
        $items = LabItem::type($type)->orderBy('sort_order')->paginate(20)->withQueryString();
        return view('admin.lab-items.index', compact('items', 'type'));
    }

    public function create(Request $request)
    {
        $item = new LabItem();
        $item->type = $request->query('type', 'focus_area');
        return view('admin.lab-items.form', compact('item'));
    }

    protected function rules(): array
    {
        return [
            'type'            => ['required', 'in:focus_area,program'],
            'title_en'        => ['required', 'string', 'max:255'],
            'title_de'        => ['nullable', 'string', 'max:255'],
            'title_ar'        => ['nullable', 'string', 'max:255'],
            'description_en'  => ['nullable', 'string'],
            'description_de'  => ['nullable', 'string'],
            'description_ar'  => ['nullable', 'string'],
            'cta_label_en'    => ['nullable', 'string', 'max:255'],
            'cta_label_de'    => ['nullable', 'string', 'max:255'],
            'cta_label_ar'    => ['nullable', 'string', 'max:255'],
            'cta_url'         => ['nullable', 'string', 'max:500'],
            'accent_color'    => ['nullable', 'string', 'max:20'],
            'sort_order'      => ['nullable', 'integer'],
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_visible'] = $request->boolean('is_visible');
        $data['tags_en'] = $this->linesToArray($request->input('tags_en_text'));
        $data['tags_de'] = $this->linesToArray($request->input('tags_de_text'));
        $data['tags_ar'] = $this->linesToArray($request->input('tags_ar_text'));
        LabItem::create($data);
        return redirect()->route('admin.lab-items.index', ['type' => $data['type']])->with('status', 'Item created.');
    }

    public function edit(string $id)
    {
        $item = LabItem::findOrFail($id);
        return view('admin.lab-items.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = LabItem::findOrFail($id);
        $data = $request->validate($this->rules());
        $data['is_visible'] = $request->boolean('is_visible');
        $data['tags_en'] = $this->linesToArray($request->input('tags_en_text'));
        $data['tags_de'] = $this->linesToArray($request->input('tags_de_text'));
        $data['tags_ar'] = $this->linesToArray($request->input('tags_ar_text'));
        $item->update($data);
        return redirect()->route('admin.lab-items.index', ['type' => $data['type']])->with('status', 'Item updated.');
    }

    public function destroy(string $id)
    {
        $item = LabItem::findOrFail($id);
        $type = $item->type;
        $item->delete();
        return redirect()->route('admin.lab-items.index', ['type' => $type])->with('status', 'Item deleted.');
    }

    private function linesToArray(?string $text): array
    {
        if (!$text) return [];
        return collect(explode("\n", $text))->map(fn ($l) => trim($l))->filter()->values()->all();
    }
}
