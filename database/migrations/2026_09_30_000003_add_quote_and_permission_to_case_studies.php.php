<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Founder's brief, item 16: "Build a Case Study template with client,
     * problem, solution, measurable result, and a quote, marked 'Published
     * with permission'." Client/problem/solution/result already existed —
     * this adds the missing quote fields and the permission flag, which
     * defaults to false so a case study can never show a client quote
     * without someone explicitly confirming permission was given.
     */
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->text('quote_en')->nullable()->after('outcomes_ar');
            $table->text('quote_de')->nullable()->after('quote_en');
            $table->text('quote_ar')->nullable()->after('quote_de');
            $table->string('quote_author')->nullable()->after('quote_ar');
            $table->boolean('published_with_permission')->default(false)->after('quote_author');
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropColumn(['quote_en', 'quote_de', 'quote_ar', 'quote_author', 'published_with_permission']);
        });
    }
};