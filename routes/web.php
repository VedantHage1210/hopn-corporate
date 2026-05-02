<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\CareerController;
use App\Http\Controllers\Public\CaseStudyController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\LeadController;
use App\Http\Controllers\Public\LegalController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\PartnerController;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\ProgramController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Public\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/en'))->name('root');

Route::prefix('{lang}')
    ->whereIn('lang', ['en', 'de'])
    ->middleware(['setLocale'])
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [PageController::class, 'about'])->name('about');

        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

        Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
        Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

        Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('case-studies.index');
        Route::get('/case-studies/{slug}', [CaseStudyController::class, 'show'])->name('case-studies.show');

        Route::get('/insights', [BlogController::class, 'index'])->name('insights.index');
        Route::get('/insights/category/{slug}', [BlogController::class, 'category'])->name('insights.category');
        Route::get('/insights/{slug}', [BlogController::class, 'show'])->name('insights.show');

        Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');         Route::get('/partner-inquiry', function() { return view('public.partners.inquiry'); })->name('partner-inquiry.index');

        Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
        Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
        Route::post('/careers/{slug}/apply', [CareerController::class, 'apply'])
            ->middleware('throttle:5,1')
            ->name('careers.apply');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contact', [ContactController::class, 'submit'])->middleware('throttle:5,1')->name('contact.submit');

        Route::post('/request-proposal', [LeadController::class, 'proposal'])->middleware('throttle:5,1')->name('leads.proposal');
        Route::post('/partner-inquiry', [LeadController::class, 'partnerInquiry'])->middleware('throttle:5,1')->name('leads.partner');
        Route::get('/training', function() { return view('public.training.index'); })->name('training.index');         Route::post('/training-application', [LeadController::class, 'trainingApplication'])->middleware('throttle:5,1')->name('leads.training');

        Route::get('/legal/impressum', [LegalController::class, 'impressum'])->name('legal.impressum');
        Route::get('/legal/privacy-policy', [LegalController::class, 'privacy'])->name('legal.privacy');
        Route::get('/legal/cookie-policy', [LegalController::class, 'cookie'])->name('legal.cookie');
    });

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
