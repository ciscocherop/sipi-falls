<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add timestamps to contact_messages if they don't exist
        if (!Schema::hasColumn('contact_messages', 'created_at')) {
            Schema::table('contact_messages', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to bookings if they don't exist
        if (!Schema::hasColumn('bookings', 'created_at')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to newsletter_subscribers if they don't exist
        if (!Schema::hasColumn('newsletter_subscribers', 'created_at')) {
            Schema::table('newsletter_subscribers', function (Blueprint $table) {
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove timestamps from contact_messages
        if (Schema::hasColumn('contact_messages', 'created_at')) {
            Schema::table('contact_messages', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        // Remove timestamps from bookings
        if (Schema::hasColumn('bookings', 'created_at')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        // Remove timestamps from newsletter_subscribers
        if (Schema::hasColumn('newsletter_subscribers', 'created_at')) {
            Schema::table('newsletter_subscribers', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
    }
};
