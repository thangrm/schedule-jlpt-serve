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
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->boolean('is_done');
            //Vocabulary
            $table->integer('number_word');
            $table->integer('number_word_completed');
            $table->text('vocabulary_note');
            //Grammar
            $table->boolean('is_study_grammar');
            $table->text('grammar_note');
            //Listen
            $table->boolean('is_study_listen');
            $table->boolean('listen_checked');
            //Reading
            $table->boolean('is_study_reading');
            $table->boolean('reading_checked');
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
