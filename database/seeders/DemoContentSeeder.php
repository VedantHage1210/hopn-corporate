<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\CaseStudy;
use App\Models\Job;
use App\Models\Lead;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Program;
use App\Models\Redirect;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DemoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultingCategory = ServiceCategory::updateOrCreate(
            ['slug' => 'consulting'],
            [
                'name' => 'Consulting',
                'name_de' => 'Beratung',
                'description' => 'Strategic growth and digital transformation consulting.',
                'description_de' => 'Strategische Wachstums- und Transformationsberatung.',
                'is_active' => true,
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'ai-strategy'],
            [
                'service_category_id' => $consultingCategory->id,
                'name' => 'AI Strategy',
                'name_de' => 'KI-Strategie',
                'summary' => 'Roadmaps for AI adoption across people, process and platforms.',
                'summary_de' => 'Roadmaps fuer KI-Einfuehrung in Teams, Prozessen und Plattformen.',
                'body' => 'We guide enterprises from AI opportunity assessment to operational rollout.',
                'body_de' => 'Wir begleiten Unternehmen von der KI-Analyse bis zur operativen Umsetzung.',
                'highlights' => ['Assessment', 'Roadmap', 'Governance'],
                'is_active' => true,
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'platform-modernization'],
            [
                'service_category_id' => $consultingCategory->id,
                'name' => 'Platform Modernization',
                'name_de' => 'Plattformmodernisierung',
                'summary' => 'Cloud and architecture upgrades for resilient delivery.',
                'summary_de' => 'Cloud- und Architektur-Upgrades fuer resiliente Lieferung.',
                'body' => 'We modernize core architecture and release flow for scale.',
                'is_active' => true,
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'data-governance'],
            [
                'service_category_id' => $consultingCategory->id,
                'name' => 'Data Governance',
                'name_de' => 'Daten-Governance',
                'summary' => 'Policies and operating model for trusted enterprise data.',
                'summary_de' => 'Richtlinien und Betriebsmodell fuer vertrauenswuerdige Daten.',
                'body' => 'We define governance controls, ownership, and quality metrics.',
                'is_active' => true,
                'is_published' => true,
                'published_at' => now()->subDays(6),
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'enterprise-ai-foundation'],
            [
                'title_en' => 'Enterprise AI Foundation',
                'summary_en' => 'A practical enablement track for leadership and delivery teams.',
                'audience_en' => 'Directors, product managers, and tech leads',
                'duration_weeks' => 8,
                'is_published' => true,
                'published_at' => now()->subDays(4),
            ]
        );

        Program::updateOrCreate(
            ['slug' => 'digital-product-execution'],
            [
                'title_en' => 'Digital Product Execution',
                'summary_en' => 'Hands-on execution training for product and engineering pods.',
                'audience_en' => 'Product teams and engineering managers',
                'duration_weeks' => 6,
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'hopn-command-center'],
            [
                'title_en' => 'HOPn Command Center',
                'summary_en' => 'Portfolio-level visibility into initiatives, risks, and outcomes.',
                'problem_en' => 'Enterprises struggle to track transformation impact consistently.',
                'solution_en' => 'A unified dashboard for delivery, risk, and value realization.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        );

        CaseStudy::updateOrCreate(
            ['slug' => 'global-rollout-automation'],
            [
                'title_en' => 'Global Rollout Automation',
                'industry' => 'Manufacturing',
                'client_name' => 'Acme AG',
                'challenge_en' => 'Manual governance slowed cross-region releases.',
                'solution_en' => 'Automated release controls and KPI visibility.',
                'outcomes_en' => 'Release cycle time reduced by 37% in two quarters.',
                'is_published' => true,
                'published_at' => now()->subDays(4),
            ]
        );

        CaseStudy::updateOrCreate(
            ['slug' => 'shared-data-platform-launch'],
            [
                'title_en' => 'Shared Data Platform Launch',
                'industry' => 'Logistics',
                'client_name' => 'BlueRail',
                'challenge_en' => 'Data was fragmented across business units.',
                'solution_en' => 'Unified data model and governance workflow.',
                'outcomes_en' => 'Reporting lead time reduced from 14 days to 2 days.',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ]
        );

        CaseStudy::updateOrCreate(
            ['slug' => 'ai-assist-service-desk'],
            [
                'title_en' => 'AI Assist Service Desk',
                'industry' => 'Technology',
                'client_name' => 'DataForge',
                'challenge_en' => 'Support queues increased while SLA pressure grew.',
                'solution_en' => 'AI-first triage and knowledge routing model.',
                'outcomes_en' => 'First response SLA compliance improved to 96%.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        );

        $homepage = Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'title_de' => 'Startseite',
                'excerpt' => 'Welcome to HOPn Corporate.',
                'excerpt_de' => 'Willkommen bei HOPn Corporate.',
                'seo_meta' => ['title' => 'HOPn Corporate', 'description' => 'Enterprise growth with AI'],
                'is_visible' => true,
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ]
        );

        PageBlock::updateOrCreate(
            ['page_id' => $homepage->id, 'block_type' => 'hero', 'sort_order' => 1],
            [
                'title' => 'Scale smarter with HOPn',
                'title_de' => 'Skalieren Sie smarter mit HOPn',
                'content' => [
                    'subtitle' => 'Your strategic AI and growth partner.',
                    'cta' => 'Book a discovery call',
                ],
                'is_visible' => true,
            ]
        );

        $author = Author::updateOrCreate(
            ['slug' => 'maria-stein'],
            [
                'name' => 'Maria Stein',
                'email' => 'maria.stein@hopn.eu',
                'bio' => 'Director of Insights at HOPn.',
                'bio_de' => 'Director of Insights bei HOPn.',
                'is_active' => true,
            ]
        );

        $blogCategory = BlogCategory::updateOrCreate(
            ['slug' => 'insights'],
            [
                'name' => 'Insights',
                'name_de' => 'Einblicke',
                'description' => 'Research and practical playbooks for enterprise teams.',
                'description_de' => 'Forschung und praktische Playbooks fuer Unternehmensteams.',
                'is_active' => true,
            ]
        );

        $tag = BlogTag::updateOrCreate(
            ['slug' => 'ai-transformation'],
            [
                'name' => 'AI Transformation',
                'name_de' => 'KI-Transformation',
                'is_active' => true,
            ]
        );

        $post = BlogPost::updateOrCreate(
            ['slug' => 'building-ai-ready-organizations'],
            [
                'author_id' => $author->id,
                'blog_category_id' => $blogCategory->id,
                'title' => 'Building AI-Ready Organizations',
                'title_de' => 'KI-bereite Organisationen aufbauen',
                'excerpt' => 'How enterprise teams align strategy, data and culture for AI adoption.',
                'excerpt_de' => 'Wie Unternehmen Strategie, Daten und Kultur fuer KI-Einfuehrung ausrichten.',
                'content' => 'A practical framework to scale AI responsibly across business units.',
                'content_de' => 'Ein praktischer Rahmen zur verantwortungsvollen KI-Skalierung in Geschaeftsbereichen.',
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ]
        );
        $post->tags()->sync([$tag->id]);

        Job::updateOrCreate(
            ['slug' => 'senior-growth-consultant'],
            [
                'title' => 'Senior Growth Consultant',
                'title_de' => 'Senior Growth Berater',
                'department' => 'Growth',
                'location' => 'Berlin / Hybrid',
                'employment_type' => 'full-time',
                'summary' => 'Lead strategic growth programs for enterprise clients.',
                'summary_de' => 'Leiten Sie strategische Wachstumsprogramme fuer Unternehmenskunden.',
                'description' => 'You will own consulting engagements and mentor project teams.',
                'description_de' => 'Sie verantworten Beratungsprojekte und betreuen Projektteams.',
                'is_published' => true,
                'is_active' => true,
                'application_deadline' => now()->addMonth()->toDateString(),
                'published_at' => now()->subDays(5),
            ]
        );

        Lead::updateOrCreate(
            ['email' => 'ana.keller@futurecorp.de'],
            [
                'type' => 'proposal',
                'name' => 'Ana Keller',
                'phone' => '+49-151-555-0199',
                'company' => 'FutureCorp GmbH',
                'message' => 'We need support with AI operating model design.',
                'source_url' => '/en/request-proposal',
                'utm_source' => 'linkedin',
                'utm_medium' => 'paid-social',
                'utm_campaign' => 'q2-enterprise-growth',
                'status' => 'new',
            ]
        );

        Redirect::updateOrCreate(
            ['from_url' => '/old-services'],
            [
                'to_url' => '/services',
                'http_status' => 301,
                'is_active' => true,
            ]
        );

        foreach ([
            ['Acme AG', 'customer'],
            ['NordCloud', 'tech_partner'],
            ['TU Berlin', 'academic'],
            ['Velocity Delivery', 'delivery'],
            ['BlueRail', 'customer'],
            ['DataForge', 'tech_partner'],
        ] as $index => $partner) {
            Partner::updateOrCreate(
                ['name' => $partner[0]],
                [
                    'type' => $partner[1],
                    'url' => 'https://example.com',
                    'description_en' => $partner[0] . ' partnership profile.',
                    'sort_order' => $index + 1,
                    'visible' => true,
                ]
            );
        }

        Testimonial::updateOrCreate(
            ['author_name' => 'Olivia Hartmann'],
            [
                'quote_en' => 'HOPn accelerated our modernization roadmap with excellent execution discipline.',
                'author_role' => 'VP Transformation',
                'company' => 'Acme AG',
                'sort_order' => 1,
                'visible' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['author_name' => 'Lukas Weber'],
            [
                'quote_en' => 'Their team translated strategic goals into measurable delivery outcomes.',
                'author_role' => 'Chief Product Officer',
                'company' => 'BlueRail',
                'sort_order' => 2,
                'visible' => true,
            ]
        );
    }
}
