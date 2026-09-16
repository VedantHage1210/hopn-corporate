<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LabsPageContent;
use Illuminate\Http\Request;

class LabsPageController extends Controller
{
    public function edit()
    {
        $item = LabsPageContent::singleton();
        return view('admin.labs.hero', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_eyebrow_en'  => ['nullable', 'string', 'max:255'],
            'hero_eyebrow_de'  => ['nullable', 'string', 'max:255'],
            'hero_eyebrow_ar'  => ['nullable', 'string', 'max:255'],
            'hero_title_en'    => ['required', 'string', 'max:255'],
            'hero_title_de'    => ['nullable', 'string', 'max:255'],
            'hero_title_ar'    => ['nullable', 'string', 'max:255'],
            'hero_subtitle_en' => ['nullable', 'string'],
            'hero_subtitle_de' => ['nullable', 'string'],
            'hero_subtitle_ar' => ['nullable', 'string'],
        ]);

        $data['hero_tags_en'] = $this->linesToArray($request->input('hero_tags_en_text'));
        $data['hero_tags_de'] = $this->linesToArray($request->input('hero_tags_de_text'));
        $data['hero_tags_ar'] = $this->linesToArray($request->input('hero_tags_ar_text'));

        $item = LabsPageContent::singleton();
        $item->update($data);

        return redirect()->route('admin.labs.hero.edit')->with('status', 'Labs hero content updated.');
    }

    private function linesToArray(?string $text): array
    {
        if (!$text) return [];
        return collect(explode("\n", $text))->map(fn ($l) => trim($l))->filter()->values()->all();
    }
}
