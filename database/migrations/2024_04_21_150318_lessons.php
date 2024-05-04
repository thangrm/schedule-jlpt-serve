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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id');
            $table->date('date')->unique();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->boolean('is_done')->default(false);
            //Vocabulary
            $table->integer('number_word');
            $table->integer('number_word_completed')->default(0);
            $table->text('vocabulary_note')->nullable();
            //Grammar
            $table->text('grammar_note')->nullable();
            $table->boolean('is_study_grammar');
            $table->boolean('grammar_checked')->default(false);
            //Listen
            $table->boolean('is_study_listening');
            $table->boolean('listening_checked')->default(false);
            //Reading
            $table->boolean('is_study_reading');
            $table->boolean('reading_checked')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
