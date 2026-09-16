<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // One row per "solution landing page" (Digital Twins, Engineering
        // as a Service, and future ones like AI Solutions/FinTech/EduTech
        // if approved later) — holds the page-level copy (hero + section
        // headers + final CTA). The repeatable content (capabilities,
        // use cases, industries, deliverables) lives in solution_blocks.
        Schema::create('solution_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g. digital-twins-oems, engineering-as-a-service
            $table->string('nav_label_en')->nullable();
            $table->string('nav_label_de')->nullable();
            $table->string('nav_label_ar')->nullable();

            $table->string('hero_eyebrow_en')->nullable();
            $table->string('hero_eyebrow_de')->nullable();
            $table->string('hero_eyebrow_ar')->nullable();
            $table->string('hero_title_en');
            $table->string('hero_title_de')->nullable();
            $table->string('hero_title_ar')->nullable();
            $table->text('hero_subtitle_en')->nullable();
            $table->text('hero_subtitle_de')->nullable();
            $table->text('hero_subtitle_ar')->nullable();
            $table->text('hero_note_en')->nullable();
            $table->text('hero_note_de')->nullable();
            $table->text('hero_note_ar')->nullable();

            $table->string('cta1_label_en')->nullable();
            $table->string('cta1_label_de')->nullable();
            $table->string('cta1_label_ar')->nullable();
            $table->string('cta1_url')->nullable();
            $table->string('cta2_label_en')->nullable();
            $table->string('cta2_label_de')->nullable();
            $table->string('cta2_label_ar')->nullable();
            $table->string('cta2_url')->nullable();

            $table->string('capabilities_eyebrow_en')->nullable();
            $table->string('capabilities_eyebrow_de')->nullable();
            $table->string('capabilities_eyebrow_ar')->nullable();
            $table->string('capabilities_title_en')->nullable();
            $table->string('capabilities_title_de')->nullable();
            $table->string('capabilities_title_ar')->nullable();
            $table->text('capabilities_subtitle_en')->nullable();
            $table->text('capabilities_subtitle_de')->nullable();
            $table->text('capabilities_subtitle_ar')->nullable();

            $table->string('usecases_eyebrow_en')->nullable();
            $table->string('usecases_eyebrow_de')->nullable();
            $table->string('usecases_eyebrow_ar')->nullable();
            $table->string('usecases_title_en')->nullable();
            $table->string('usecases_title_de')->nullable();
            $table->string('usecases_title_ar')->nullable();

            $table->string('industries_eyebrow_en')->nullable();
            $table->string('industries_eyebrow_de')->nullable();
            $table->string('industries_eyebrow_ar')->nullable();
            $table->string('industries_title_en')->nullable();
            $table->string('industries_title_de')->nullable();
            $table->string('industries_title_ar')->nullable();
            $table->text('industries_subtitle_en')->nullable();
            $table->text('industries_subtitle_de')->nullable();
            $table->text('industries_subtitle_ar')->nullable();

            $table->string('deliverables_title_en')->nullable();
            $table->string('deliverables_title_de')->nullable();
            $table->string('deliverables_title_ar')->nullable();

            $table->string('final_eyebrow_en')->nullable();
            $table->string('final_eyebrow_de')->nullable();
            $table->string('final_eyebrow_ar')->nullable();
            $table->string('final_title_en')->nullable();
            $table->string('final_title_de')->nullable();
            $table->string('final_title_ar')->nullable();
            $table->text('final_subtitle_en')->nullable();
            $table->text('final_subtitle_de')->nullable();
            $table->text('final_subtitle_ar')->nullable();
            $table->string('final_cta1_label_en')->nullable();
            $table->string('final_cta1_label_de')->nullable();
            $table->string('final_cta1_label_ar')->nullable();
            $table->string('final_cta1_url')->nullable();
            $table->string('final_cta2_label_en')->nullable();
            $table->string('final_cta2_label_de')->nullable();
            $table->string('final_cta2_label_ar')->nullable();
            $table->string('final_cta2_url')->nullable();

            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // Repeatable content for a solution page — one block model reused
        // for 4 different sections (capability / usecase / industry /
        // deliverable), same pattern as page_blocks.
        Schema::create('solution_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solution_page_id')->constrained()->cascadeOnDelete();
            $table->string('block_type'); // capability | usecase | industry | deliverable
            $table->unsignedInteger('number')->nullable(); // for capabilities: 01, 02...
            $table->string('title_en')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ar')->nullable();
            $table->json('bullets_en')->nullable();
            $table->json('bullets_de')->nullable();
            $table->json('bullets_ar')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        $this->seedDigitalTwins();
        $this->seedEngineeringAsAService();
    }

    private function seedDigitalTwins(): void
    {
        $pageId = \DB::table('solution_pages')->insertGetId([
            'slug' => 'digital-twins-oems',
            'nav_label_en' => 'Digital Twin for OEMs',
            'hero_eyebrow_en' => 'Digital Twins / Engineering',
            'hero_title_en' => 'Design, build, and scale digital twins for products, plants, and supply chains',
            'hero_subtitle_en' => 'Partner with HOPn to deploy enterprise-grade digital twins across your product portfolio, factory network, and supply chain. We combine deep engineering expertise with AI-driven simulation to help OEMs optimize production, quality, and lifecycle performance at scale.',
            'hero_note_en' => 'Built for OEM manufacturers in automotive, industrial equipment, and production — where complex systems, long lifecycles, and multi-site operations demand connected twin intelligence.',
            'cta1_label_en' => 'Book a consultation',
            'cta2_label_en' => 'Request proposal',
            'capabilities_eyebrow_en' => 'Capabilities',
            'capabilities_title_en' => 'End-to-end digital twin engineering for OEM scale',
            'capabilities_subtitle_en' => 'From product design to plant operations and supply chain visibility — HOPn delivers integrated twin systems that connect engineering, manufacturing, and enterprise data.',
            'usecases_eyebrow_en' => 'Use Cases',
            'usecases_title_en' => 'Where OEMs deploy digital twins',
            'industries_eyebrow_en' => 'Industries',
            'industries_title_en' => 'Built for complex OEM environments',
            'industries_subtitle_en' => 'Automotive, manufacturing, and production OEMs rely on HOPn to connect product engineering with shop floor reality — and extend visibility across global supply networks.',
            'deliverables_title_en' => 'What you receive',
            'final_eyebrow_en' => 'Digital Twin Solutions',
            'final_title_en' => 'Scale digital twins across your OEM operations',
            'final_subtitle_en' => 'Scope a pilot, request a proposal, or book a consultation with HOPn engineers who specialize in product, plant, and supply chain twins for automotive and industrial manufacturers.',
            'final_cta1_label_en' => 'Book a consultation',
            'final_cta2_label_en' => 'Request proposal',
            'is_published' => true,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $capabilities = [
            ['num'=>1, 'title'=>'Product Digital Twins', 'desc'=>'Virtual replicas spanning design, production, and full product lifecycle management.', 'bullets'=>['Design-to-production twin synchronization','BOM, configuration, and variant management','Lifecycle performance and field telemetry','PLM and CAD integration']],
            ['num'=>2, 'title'=>'Factory & Plant Twins', 'desc'=>'Simulation, monitoring, and optimization of production lines and facilities.', 'bullets'=>['Real-time shop floor monitoring dashboards','Production simulation and what-if scenarios','OEE optimization and bottleneck analysis','MES and SCADA integration']],
            ['num'=>3, 'title'=>'Supply Chain Visibility Twins', 'desc'=>'End-to-end visibility across suppliers, logistics, and inventory networks.', 'bullets'=>['Multi-tier supplier visibility','Inventory and logistics tracking','Disruption simulation and risk modeling','ERP and WMS integration']],
            ['num'=>4, 'title'=>'Predictive Maintenance & Analytics', 'desc'=>'Real-time analytics and AI-driven maintenance planning across twin-connected assets.', 'bullets'=>['Failure prediction and anomaly detection','Condition-based maintenance scheduling','Asset performance analytics','Historian and sensor data integration']],
            ['num'=>5, 'title'=>'Enterprise System Integration', 'desc'=>'Connect digital twins with IoT, PLM, MES, and ERP for unified operations.', 'bullets'=>['IoT platform and sensor integration','PLM and MES connectivity','ERP data synchronization','Unified operations data layer']],
            ['num'=>6, 'title'=>'AI-Driven Simulation & Intelligence', 'desc'=>'Decision intelligence powered by AI, layered on top of twin data for scenario planning.', 'bullets'=>['AI-powered scenario simulation','Digital thread analytics','Optimization recommendations','Continuous model refinement']],
        ];
        foreach ($capabilities as $i => $c) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'capability', 'number'=>$c['num'],
                'title_en'=>$c['title'], 'description_en'=>$c['desc'], 'bullets_en'=>json_encode($c['bullets']),
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $useCases = [
            ['title'=>'Automotive OEM production networks', 'desc'=>'Deploy product and plant twins across vehicle platforms — from powertrain lines to assembly — with unified visibility for engineering and operations teams.'],
            ['title'=>'Manufacturing quality control', 'desc'=>'Monitor production quality in real time, correlate defects with process parameters, and simulate corrective actions before they reach the shop floor.'],
            ['title'=>'Production optimization', 'desc'=>'Run digital twin simulations to optimize throughput, reduce waste, and balance capacity across multi-site manufacturing operations.'],
            ['title'=>'Remote monitoring & service', 'desc'=>'Enable remote diagnostics, predictive maintenance, and field service intelligence for OEM products deployed across customer sites worldwide.'],
        ];
        foreach ($useCases as $i => $u) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'usecase',
                'title_en'=>$u['title'], 'description_en'=>$u['desc'],
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $industries = ['Automotive', 'Manufacturing', 'Production & Industrials', 'Industrial Equipment OEM', 'Aerospace & Defense', 'Energy & Utilities'];
        foreach ($industries as $i => $label) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'industry', 'title_en'=>$label,
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $deliverables = ['Digital twin architecture and reference models', 'IoT, PLM, MES, and ERP integration blueprints', 'Pilot twin deployment with measurable KPIs', 'Simulation environments and scenario libraries', 'Operations dashboards and alerting frameworks', 'Roadmap for scaling twins across sites and product lines'];
        foreach ($deliverables as $i => $label) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'deliverable', 'title_en'=>$label,
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }
    }

    private function seedEngineeringAsAService(): void
    {
        $pageId = \DB::table('solution_pages')->insertGetId([
            'slug' => 'engineering-as-a-service',
            'nav_label_en' => 'Engineering as a Service',
            'hero_eyebrow_en' => 'Engineering as a Service',
            'hero_title_en' => 'Embedded engineering teams for enterprise deep-tech delivery',
            'hero_subtitle_en' => 'Deploy senior engineers on demand. HOPn embeds cross-functional teams into your organization to design, build, and operate AI products, data platforms, smart factory systems, and OEM-integrated solutions — at enterprise velocity.',
            'cta1_label_en' => 'Request engineering capacity',
            'cta2_label_en' => 'Pair with expert advisory',
            'capabilities_eyebrow_en' => 'Capabilities',
            'capabilities_title_en' => 'Four engineering disciplines. One embedded team.',
            'capabilities_subtitle_en' => 'HOPn assembles senior engineers across AI, data, manufacturing, and OEM integration — operating as an extension of your product and platform organization.',
            'usecases_eyebrow_en' => 'Use Cases',
            'usecases_title_en' => 'Where enterprises deploy EaaS',
            'industries_eyebrow_en' => 'Industries',
            'industries_title_en' => 'Built for complex, regulated environments',
            'industries_subtitle_en' => 'From factory floors to OEM product lines, HOPn engineers operate where deep-tech delivery meets enterprise governance and long product lifecycles.',
            'deliverables_title_en' => 'What you receive',
            'final_eyebrow_en' => 'Engineering Capacity',
            'final_title_en' => 'Embed HOPn engineers in your next initiative',
            'final_subtitle_en' => 'Scope a dedicated squad for AI products, data platforms, manufacturing systems, or OEM integration — with flexible engagement models for enterprise teams.',
            'final_cta1_label_en' => 'Request EaaS scoping call',
            'final_cta2_label_en' => 'View all services',
            'is_published' => true,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $capabilities = [
            ['num'=>1, 'title'=>'AI Applications Engineering', 'desc'=>'Custom AI/ML products, LLM integration, and production-grade intelligent systems.', 'bullets'=>['Custom AI/ML application development','LLM integration, RAG systems, and AI agents','MLOps and production AI deployment','AI product engineering from prototype to scale']],
            ['num'=>2, 'title'=>'Data Engineering', 'desc'=>'Enterprise data platforms, pipelines, and analytics infrastructure built for scale.', 'bullets'=>['Data pipelines, ETL/ELT, and orchestration','Data platforms, warehouses, and lakehouse architecture','Real-time streaming and data quality frameworks','Analytics infrastructure and observability']],
            ['num'=>3, 'title'=>'Manufacturing Engineering', 'desc'=>'Industry 4.0, smart factory systems, and digital twin engineering for production.', 'bullets'=>['Industry 4.0 and smart factory integration','Digital twin engineering for production lines','IoT integration and predictive maintenance','Process optimization and OEE improvement']],
            ['num'=>4, 'title'=>'OEM Support', 'desc'=>'Long-term embedded engineering for original equipment manufacturers and integrators.', 'bullets'=>['OEM partnership and co-development programs','Embedded software and hardware integration','White-label engineering and productization','Long-term technical partnership and lifecycle support']],
        ];
        foreach ($capabilities as $i => $c) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'capability', 'number'=>$c['num'],
                'title_en'=>$c['title'], 'description_en'=>$c['desc'], 'bullets_en'=>json_encode($c['bullets']),
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $useCases = [
            ['title'=>'Scale AI from pilot to production', 'desc'=>'Embed HOPn engineers to ship LLM-powered products, agent workflows, and governed MLOps pipelines without rebuilding your org.'],
            ['title'=>'Modernize data foundations', 'desc'=>'Stand up cloud-native data platforms, streaming pipelines, and quality frameworks that unblock analytics and AI initiatives.'],
            ['title'=>'Digitize manufacturing operations', 'desc'=>'Connect shop floor systems, deploy digital twins, and deliver predictive maintenance with engineers who understand OT/IT convergence.'],
            ['title'=>'Extend OEM product roadmaps', 'desc'=>'Augment internal R&D with white-label engineering capacity for firmware, embedded software, and integrated hardware platforms.'],
        ];
        foreach ($useCases as $i => $u) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'usecase',
                'title_en'=>$u['title'], 'description_en'=>$u['desc'],
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $industries = ['Manufacturing & Industrials', 'Automotive & Mobility', 'Energy & Utilities', 'Financial Services', 'Healthcare & Life Sciences', 'Technology & SaaS', 'OEM & Industrial Equipment', 'Telecom & Infrastructure'];
        foreach ($industries as $i => $label) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'industry', 'title_en'=>$label,
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }

        $deliverables = ['Dedicated engineering pods aligned to your roadmap', 'Solution architecture and technical design documents', 'Production-ready code, CI/CD, and infrastructure as code', 'Integration with enterprise systems and OEM platforms', 'Knowledge transfer, runbooks, and operational handover', 'Flexible engagement models — project, squad, or retained capacity'];
        foreach ($deliverables as $i => $label) {
            \DB::table('solution_blocks')->insert([
                'solution_page_id'=>$pageId, 'block_type'=>'deliverable', 'title_en'=>$label,
                'sort_order'=>$i, 'is_visible'=>true, 'created_at'=>now(), 'updated_at'=>now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('solution_blocks');
        Schema::dropIfExists('solution_pages');
    }
};
