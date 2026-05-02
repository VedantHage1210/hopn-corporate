<?php

use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\MediaAssetController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RedirectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:superadmin|admin|editor|publisher|translator'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Content modules
    Route::resource('services', ServiceController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('products', ProductController::class);
    Route::resource('case-studies', CaseStudyController::class);
    Route::resource('pages', PageController::class);

    // Blog / Insights
    Route::resource('blog-posts', BlogPostController::class);
    Route::resource('blog-categories', BlogCategoryController::class);
    Route::resource('blog-tags', BlogTagController::class);
    Route::resource('authors', AuthorController::class);

    // People & partners
    Route::resource('partners', PartnerController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('team-members', TeamMemberController::class);

    // Careers
    Route::resource('jobs', JobController::class);
    Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
    Route::get('applicants/{applicant}', [ApplicantController::class, 'show'])->name('applicants.show');
    Route::patch('applicants/{applicant}', [ApplicantController::class, 'update'])->name('applicants.update');
    Route::delete('applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');

    // Leads / CRM
    Route::resource('leads', LeadController::class)->except(['create', 'store', 'destroy']);
    Route::get('leads/export', [LeadController::class, 'export'])->name('leads.export');

    // Admin & settings
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('navigation', NavigationController::class);

    // Media
    Route::resource('media-assets', MediaAssetController::class);

    // SEO & Redirects
    Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
    Route::post('seo/settings', [SeoController::class, 'updateSettings'])->name('seo.settings.update');
    Route::post('seo/sitemap', [SeoController::class, 'generateSitemap'])->name('seo.sitemap.generate');
    Route::post('seo/redirects', [SeoController::class, 'storeRedirect'])->name('seo.redirects.store');
    Route::delete('seo/redirects/{redirect}', [SeoController::class, 'destroyRedirect'])->name('seo.redirects.destroy');
    Route::resource('redirects', RedirectController::class);

    // System
    Route::resource('languages', LanguageController::class);
    Route::resource('legal', LegalController::class);
    Route::resource('audit-logs', AuditLogController::class)->only(['index', 'show']);
});
