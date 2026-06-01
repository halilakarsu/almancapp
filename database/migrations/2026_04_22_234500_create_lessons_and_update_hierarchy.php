<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // 1. Create Lessons table (Dersler)
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // 2. Add lesson_id to Topics
        Schema::table('topics', function (Blueprint $table) {
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
        });

        // 3. Add lesson_id to Words
        Schema::table('words', function (Blueprint $table) {
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
        });

        // 4. Add lesson_id to Sentences
        Schema::table('sentences', function (Blueprint $table) {
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('sentences', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
        Schema::table('words', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
        Schema::dropIfExists('lessons');
    }
};
