<?php

use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\StartupController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\InnovationDomainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LogoController;
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
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ExpertController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin permission tiers
|--------------------------------------------------------------------------
| content.edit    - create/view/update content (Editor, Translator, Publisher, Admin, Super Admin)
| content.delete  - delete content records    (Publisher, Admin, Super Admin only)
| system.manage   - Users, Roles, Settings, SEO, Redirects, Languages, Legal,
|                    Audit Logs, Leads, Applicants (Admin, Super Admin only)
|
| Every role above still needs the base 'role:...' check below just to enter
| /admin at all; the permission middleware then narrows what each role can
| actually do once inside.
*/

Route::middleware(['auth', 'role:superadmin|admin|editor|publisher|translator'])->group(function () {

    // Dashboard - visible to every admin role
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // ------------------------------------------------------------------
    // CONTENT: create / view / update (all 5 roles)
    // ------------------------------------------------------------------
    Route::middleware('permission:content.edit')->group(function () {
        Route::resource('services', ServiceController::class)->except(['destroy']);
        Route::resource('service-categories', ServiceCategoryController::class)->except(['destroy']);
        Route::resource('programs', ProgramController::class)->except(['destroy']);
        Route::resource('products', ProductController::class)->except(['destroy']);
        Route::resource('case-studies', CaseStudyController::class)->except(['destroy']);
        Route::resource('startups', StartupController::class)->except(['destroy']);
        Route::resource('investors', InvestorController::class)->except(['destroy']);
        Route::resource('events', EventController::class)->except(['destroy']);
        Route::resource('industries', IndustryController::class)->except(['destroy']);
        Route::resource('innovation-domains', InnovationDomainController::class)->except(['destroy']);
        Route::resource('pages', PageController::class)->except(['destroy']);

        Route::resource('blog-posts', BlogPostController::class)->except(['destroy']);
        Route::resource('blog-categories', BlogCategoryController::class)->except(['destroy']);
        Route::resource('blog-tags', BlogTagController::class)->except(['destroy']);
        Route::resource('authors', AuthorController::class)->except(['destroy']);

        Route::resource('partners', PartnerController::class)->except(['destroy']);
        Route::resource('testimonials', TestimonialController::class)->except(['destroy']);
        Route::resource('team-members', TeamMemberController::class)->except(['destroy']);
        Route::resource('experts', ExpertController::class)->except(['destroy']);

        Route::resource('jobs', JobController::class)->except(['destroy']);
        Route::resource('logos', LogoController::class)->except(['destroy']);
        Route::resource('media-assets', MediaAssetController::class)->except(['destroy']);
    });

    // ------------------------------------------------------------------
    // CONTENT: delete (Publisher, Admin, Super Admin only)
    // ------------------------------------------------------------------
    Route::middleware('permission:content.delete')->group(function () {
        Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::delete('service-categories/{service_category}', [ServiceCategoryController::class, 'destroy'])->name('service-categories.destroy');
        Route::delete('programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::delete('case-studies/{case_study}', [CaseStudyController::class, 'destroy'])->name('case-studies.destroy');
        Route::delete('startups/{startup}', [StartupController::class, 'destroy'])->name('startups.destroy');
        Route::delete('investors/{investor}', [InvestorController::class, 'destroy'])->name('investors.destroy');
        Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
        Route::delete('industries/{industry}', [IndustryController::class, 'destroy'])->name('industries.destroy');
        Route::delete('innovation-domains/{innovation_domain}', [InnovationDomainController::class, 'destroy'])->name('innovation-domains.destroy');
        Route::delete('pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

        Route::delete('blog-posts/{blog_post}', [BlogPostController::class, 'destroy'])->name('blog-posts.destroy');
        Route::delete('blog-categories/{blog_category}', [BlogCategoryController::class, 'destroy'])->name('blog-categories.destroy');
        Route::delete('blog-tags/{blog_tag}', [BlogTagController::class, 'destroy'])->name('blog-tags.destroy');
        Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');

        Route::delete('partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
        Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
        Route::delete('team-members/{team_member}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');
        Route::delete('experts/{expert}', [ExpertController::class, 'destroy'])->name('experts.destroy');

        Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
        Route::delete('logos/{logo}', [LogoController::class, 'destroy'])->name('logos.destroy');
        Route::delete('media-assets/{media_asset}', [MediaAssetController::class, 'destroy'])->name('media-assets.destroy');
    });

    // ------------------------------------------------------------------
    // SYSTEM: Users, Roles, Settings, SEO, Redirects, Languages, Legal,
    // Audit Logs, Leads, Applicants (Admin, Super Admin only)
    // ------------------------------------------------------------------
    Route::middleware('permission:system.manage')->group(function () {
        Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
        Route::get('applicants/{applicant}', [ApplicantController::class, 'show'])->name('applicants.show');
        Route::patch('applicants/{applicant}', [ApplicantController::class, 'update'])->name('applicants.update');
        Route::delete('applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');

        Route::resource('leads', LeadController::class)->except(['create', 'store', 'destroy']);
        Route::get('leads/export', [LeadController::class, 'export'])->name('leads.export');

        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('navigation', NavigationController::class);

        Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
        Route::post('seo/settings', [SeoController::class, 'updateSettings'])->name('seo.settings.update');
        Route::post('seo/sitemap', [SeoController::class, 'generateSitemap'])->name('seo.sitemap.generate');
        Route::post('seo/redirects', [SeoController::class, 'storeRedirect'])->name('seo.redirects.store');
        Route::delete('seo/redirects/{redirect}', [SeoController::class, 'destroyRedirect'])->name('seo.redirects.destroy');
        Route::resource('redirects', RedirectController::class);

        Route::resource('languages', LanguageController::class);
        Route::resource('legal', LegalController::class);
        Route::resource('audit-logs', AuditLogController::class)->only(['index', 'show']);
    });
});
