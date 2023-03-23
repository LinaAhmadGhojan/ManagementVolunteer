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
        Schema::create('activities', function (Blueprint $table) {

            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('place');
            $table->date('start_register');
            $table->date('end_register');
            $table->integer('number_volunteer');
            $table->enum('state', ['1', '2','3'])->nullable()->default(1);
             $table->string('note_admin')->default(' ');
             $table->foreignId('id_admin')->constrained('users');
             $table->foreignId('id_initiative')->constrained('initiatives');
             $table->integer('number_comment')->default(0);
            $table->integer('number_like')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
