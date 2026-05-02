<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use App\Services\SettingsService;
use App\Services\SitemapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function __construct(
        private SettingsService $settings,
        private SitemapService $sitemap
    ) {}

    public function index()
    {
        $seoSettings = [
            'seo_default_title'       => $this->settings->get('seo_default_title', ''),
            'seo_default_description' => $this->settings->get('seo_default_description', ''),
            'seo_og_image'            => $this->settings->get('seo_og_image', ''),
            'robots_txt'              => $this->settings->get('robots_txt', "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml')),
        ];

        $redirects = Redirect::latest()->paginate(20);

        return view('admin.seo.index', compact('seoSettings', 'redirects'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'seo_default_title'       => ['nullable', 'string', 'max:255'],
            'seo_default_description' => ['nullable', 'string', 'max:500'],
            'robots_txt'              => ['nullable', 'string', 'max:5000'],
        ]);

        $this->settings->bulkSet($data);

        return back()->with('status', 'SEO settings saved.');
    }

    public function generateSitemap()
    {
        $path = public_path('sitemap.xml');

        $this->sitemap->generate()->writeToFile($path);

        return back()->with('status', 'Sitemap generated at /sitemap.xml');
    }

    public function storeRedirect(Request $request)
    {
        $data = $request->validate([
            'from_url'    => ['required', 'string', 'max:500'],
            'to_url'      => ['required', 'string', 'max:500'],
            'status_code' => ['required', 'in:301,302'],
        ]);

        Redirect::updateOrCreate(
            ['from_url' => $data['from_url']],
            [
                'to_url'      => $data['to_url'],
                'http_status' => (int) $data['status_code'],
                'is_active'   => true,
            ]
        );

        return back()->with('status', 'Redirect saved.');
    }

    public function destroyRedirect(Redirect $redirect)
    {
        $redirect->delete();

        return back()->with('status', 'Redirect deleted.');
    }
}
