<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LabStep;
use Illuminate\Http\Request;

class LabStepController extends Controller
{
    public function index()
    {
        $items = LabStep::orderBy('sort_order')->paginate(20);
        return view('admin.lab-steps.index', compact('items'));
    }

    public function create()
    {
        $item = new LabStep();
        return view('admin.lab-steps.form', compact('item'));
    }

    protected function rules(): array
    {
        return [
            'step_number'    => ['required', 'integer', 'min:1'],
            'title_en'       => ['required', 'string', 'max:255'],
            'title_de'       => ['nullable', 'string', 'max:255'],
            'title_ar'       => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_de' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'sort_order'     => ['nullable', 'integer'],
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_visible'] = $request->boolean('is_visible');
        LabStep::create($data);
        return redirect()->route('admin.lab-steps.index')->with('status', 'Step created.');
    }

    public function edit(string $id)
    {
        $item = LabStep::findOrFail($id);
        return view('admin.lab-steps.form', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = LabStep::findOrFail($id);
        $data = $request->validate($this->rules());
        $data['is_visible'] = $request->boolean('is_visible');
        $item->update($data);
        return redirect()->route('admin.lab-steps.index')->with('status', 'Step updated.');
    }

    public function destroy(string $id)
    {
        LabStep::findOrFail($id)->delete();
        return redirect()->route('admin.lab-steps.index')->with('status', 'Step deleted.');
    }
}
