<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_reactions', function (Blueprint $table) {
            $table->id();
            $table->string('activity_key'); // e.g. 'travelguide_activity_1'
            $table->string('emoji');        // thumbs_up, love, fire, wow
            $table->string('session_id');   // track per visitor
            $table->timestamps();
            $table->unique(['activity_key', 'emoji', 'session_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_reactions');
    }
};
