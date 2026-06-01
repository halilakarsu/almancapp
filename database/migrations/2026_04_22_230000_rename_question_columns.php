<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('questions', function (Blueprint $table) {
            $table->renameColumn('german_question', 'question_text');
            $table->renameColumn('turkish_meaning', 'correct_answer');
        });
    }

    public function down(): void {
        Schema::table('questions', function (Blueprint $table) {
            $table->renameColumn('question_text', 'german_question');
            $table->renameColumn('correct_answer', 'turkish_meaning');
        });
    }
};
