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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->boolean('is_read')->default(false)->after('message');
        });
        
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])
                  ->default('pending')
                  ->after('budget');
        });
        
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->enum('status', ['active', 'unsubscribed'])
                  ->default('active')
                  ->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
        
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
