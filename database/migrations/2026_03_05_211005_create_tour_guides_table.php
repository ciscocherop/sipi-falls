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
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // e.g., "Senior Guide", "Lead Climbing Instructor"
            $table->text('bio');
            $table->string('photo')->nullable(); // path to photo
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('years_experience')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0); // for sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_guides');
    }
};
