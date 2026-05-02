<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\CaseStudy;
use App\Models\Job;
use App\Models\Page;
use App\Models\Product;
use App\Models\Program;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapService
{
    private array $locales = ['en', 'de'];

    public function generate(): Sitemap
    {
        $sitemap = Sitemap::create();

        foreach ($this->locales as $lang) {
            // Static pages
            $sitemap->add(Url::create(url("/{$lang}"))
                ->setChangeFrequency('weekly')->setPriority(1.0));
            $sitemap->add(Url::create(url("/{$lang}/about"))
                ->setChangeFrequency('monthly')->setPriority(0.8));
            $sitemap->add(Url::create(url("/{$lang}/services"))
                ->setChangeFrequency('weekly')->setPriority(0.9));
            $sitemap->add(Url::create(url("/{$lang}/programs"))
                ->setChangeFrequency('weekly')->setPriority(0.9));
            $sitemap->add(Url::create(url("/{$lang}/products"))
                ->setChangeFrequency('weekly')->setPriority(0.9));
            $sitemap->add(Url::create(url("/{$lang}/case-studies"))
                ->setChangeFrequency('weekly')->setPriority(0.8));
            $sitemap->add(Url::create(url("/{$lang}/insights"))
                ->setChangeFrequency('daily')->setPriority(0.8));
            $sitemap->add(Url::create(url("/{$lang}/partners"))
                ->setChangeFrequency('monthly')->setPriority(0.6));
            $sitemap->add(Url::create(url("/{$lang}/careers"))
                ->setChangeFrequency('weekly')->setPriority(0.7));
            $sitemap->add(Url::create(url("/{$lang}/contact"))
                ->setChangeFrequency('monthly')->setPriority(0.7));
            $sitemap->add(Url::create(url("/{$lang}/legal/impressum"))
                ->setChangeFrequency('yearly')->setPriority(0.3));
            $sitemap->add(Url::create(url("/{$lang}/legal/privacy-policy"))
                ->setChangeFrequency('yearly')->setPriority(0.3));
            $sitemap->add(Url::create(url("/{$lang}/legal/cookie-policy"))
                ->setChangeFrequency('yearly')->setPriority(0.3));

            // Services
            Service::published()->each(function (Service $s) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/services/{$s->slug}"))
                    ->setLastModificationDate($s->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.8));
            });

            // Programs
            Program::where('is_published', true)->each(function (Program $p) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/programs/{$p->slug}"))
                    ->setLastModificationDate($p->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.8));
            });

            // Products
            Product::where('is_published', true)->each(function (Product $p) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/products/{$p->slug}"))
                    ->setLastModificationDate($p->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.8));
            });

            // Case Studies
            CaseStudy::where('is_published', true)->each(function (CaseStudy $cs) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/case-studies/{$cs->slug}"))
                    ->setLastModificationDate($cs->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.7));
            });

            // Blog Posts
            BlogPost::published()->each(function (BlogPost $post) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/insights/{$post->slug}"))
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.6));
            });

            // Jobs
            Job::where('is_published', true)->each(function (Job $job) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/careers/{$job->slug}"))
                    ->setLastModificationDate($job->updated_at)
                    ->setChangeFrequency('weekly')->setPriority(0.6));
            });

            // CMS Pages
            Page::where('is_published', true)->each(function (Page $page) use ($sitemap, $lang) {
                $sitemap->add(Url::create(url("/{$lang}/{$page->slug}"))
                    ->setLastModificationDate($page->updated_at)
                    ->setChangeFrequency('monthly')->setPriority(0.5));
            });
        }

        return $sitemap;
    }
}
