<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\SettingsService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SettingsService::class, function () {
            return new SettingsService();
        });
    }

    public function boot(): void
    {
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Share settings with all views
        View::composer('*', function ($view) {
            try {
                $settings = app(SettingsService::class)->all();
                $view->with('siteSettings', $settings);
            } catch (\Exception $e) {
                $view->with('siteSettings', []);
            }
        });
    }
}
