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
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // e.g., 'about_title', 'contact_phone'
            $table->text('value'); // The actual content
            $table->string('type')->default('text'); // text, textarea, email, phone
            $table->string('page'); // about, contact, travelguide
            $table->string('label'); // Human-readable label for admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
