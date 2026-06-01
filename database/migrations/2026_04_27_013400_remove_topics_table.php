<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // contents tablosundan topic_id FK'i kaldır, lesson_id ekle
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign('contents_topic_id_foreign');
            $table->dropColumn('topic_id');
            if (!Schema::hasColumn('contents', 'lesson_id')) {
                $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
            }
        });

        // words tablosundan topic_id FK'i kaldır, lesson_id ekle
        Schema::table('words', function (Blueprint $table) {
            $table->dropForeign('table_words_topic_id_foreign');
            $table->dropColumn('topic_id');
            if (!Schema::hasColumn('words', 'lesson_id')) {
                $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
            }
        });

        // Artık bağımlılık kalmadı, topics tablosunu kaldır
        Schema::dropIfExists('topics');
    }

    public function down(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic_title');
            $table->string('topic_slug')->nullable();
            $table->text('topic_description')->nullable();
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->integer('order_index')->default(0);
            $table->timestamps();
        });
    }
};
