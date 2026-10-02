<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Newsletter signups previously counted as "subscribed" the instant the
     * form was submitted, with no verification step. EU/German law requires
     * double opt-in for newsletter marketing (GDPR + confirmed-consent
     * case law). These columns let a newsletter-type Lead stay unconfirmed
     * until the subscriber clicks the link in a confirmation email.
     * Not used by regular sales leads (contact, proposal, etc.) — those stay
     * untouched (both columns nullable).
     */
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (! Schema::hasColumn('leads', 'confirmation_token')) {
                $table->string('confirmation_token', 64)->nullable()->after('locale');
            }
            if (! Schema::hasColumn('leads', 'confirmed_at')) {
                $table->timestamp('confirmed_at')->nullable()->after('confirmation_token');
            }
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['confirmation_token', 'confirmed_at']);
        });
    }
};