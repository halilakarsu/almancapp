<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('user_word_progress');
        Schema::dropIfExists('words');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('test_questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('sets');
        Schema::dropIfExists('tests');
        Schema::dropIfExists('exercise_items');
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('sentences');

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        // Not providing down methods as this is a cleanup migration
    }
};

