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
        Schema::create('activty_comment_volunteers', function (Blueprint $table) {
                $table->id();
                $table->string('comment');
                $table->boolean('like')->default(0);
                $table->foreignId('id_volunteer')->constrained('users');
                $table->foreignId('id_activity')->constrained('activities');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activty_comment_volunteers');
    }
};
