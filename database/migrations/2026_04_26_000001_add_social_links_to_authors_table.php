<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            if (! Schema::hasColumn('authors', 'linkedin_url')) {
                $table->string('linkedin_url')->nullable()->after('avatar_path');
            }
            if (! Schema::hasColumn('authors', 'twitter_url')) {
                $table->string('twitter_url')->nullable()->after('linkedin_url');
            }
            if (! Schema::hasColumn('authors', 'website_url')) {
                $table->string('website_url')->nullable()->after('twitter_url');
            }
            if (! Schema::hasColumn('authors', 'bio_en')) {
                $table->text('bio_en')->nullable()->after('bio');
            }
        });
    }

    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumnIfExists(['linkedin_url', 'twitter_url', 'website_url', 'bio_en']);
        });
    }
};
