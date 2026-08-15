<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(private SettingsService $settingsService) {}

    public function index()
    {
        $settings = SiteSetting::first()?->toArray() ?? [];
        return view('admin.settings.index', compact('settings'));
    }

    public function create() { return redirect()->route('admin.settings.index'); }
    public function show(string $id) { return redirect()->route('admin.settings.index'); }
    public function edit(string $id) { return redirect()->route('admin.settings.index'); }

    public function store(Request $request)
    {
        return $this->saveSettings($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->saveSettings($request);
    }

    public function destroy(string $id)
    {
        return redirect()->route('admin.settings.index');
    }

    private function saveSettings(Request $request)
    {
        $request->validate([
            'site_name'       => 'nullable|string|max:255',
            'site_name_de'    => 'nullable|string|max:255',
            'site_name_ar'    => 'nullable|string|max:255',
            'site_tagline'    => 'nullable|string|max:255',
            'site_tagline_de' => 'nullable|string|max:255',
            'site_tagline_ar' => 'nullable|string|max:255',
            'contact_email'   => 'nullable|email|max:255',
            'contact_phone'   => 'nullable|string|max:50',
            'office_address'  => 'nullable|string|max:500',
            'office_address_de' => 'nullable|string|max:500',
            'office_address_ar' => 'nullable|string|max:500',
            'default_locale'  => 'nullable|in:en,de,ar',
            'timezone'        => 'nullable|string|max:100',
            'social_links'    => 'nullable|array',
            'seo_defaults'    => 'nullable|array',
        ]);

        $data = $request->only([
            'site_name', 'site_name_de', 'site_name_ar',
            'site_tagline', 'site_tagline_de', 'site_tagline_ar',
            'contact_email', 'contact_phone',
            'office_address', 'office_address_de', 'office_address_ar',
            'default_locale', 'timezone',
        ]);

        $data['maintenance_mode'] = $request->boolean('maintenance_mode');
        $data['social_links']     = json_encode($request->input('social_links', []));
        $data['seo_defaults']     = json_encode($request->input('seo_defaults', []));

        $setting = SiteSetting::first();
        if ($setting) {
            $setting->update($data);
        } else {
            SiteSetting::create($data);
        }

        $this->settingsService->clearCache();

        return redirect()->route('admin.settings.index')->with('status', 'Settings saved successfully.');
    }
}
