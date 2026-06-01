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
        Schema::table('questions', function (Blueprint $table) {
            // explanation alanını kontrol et ve gerekirse oluştur/isimlendir
            if (Schema::hasColumn('questions', 'correct_answer')) {
                $table->renameColumn('correct_answer', 'explanation');
            } elseif (!Schema::hasColumn('questions', 'explanation')) {
                $table->text('explanation')->nullable()->after('question_text');
            }

            // question_type ekle
            if (!Schema::hasColumn('questions', 'question_type')) {
                $table->string('question_type')->default('multiple_choice')->after('question_text');
            }

            // media_url ekle
            if (!Schema::hasColumn('questions', 'media_url')) {
                $table->text('media_url')->nullable()->after('question_type');
            }

            // order_index ekle
            if (!Schema::hasColumn('questions', 'order_index')) {
                $table->integer('order_index')->default(0);
            }

            // is_active ekle
            if (!Schema::hasColumn('questions', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }

            // lesson_id zaten varsa ama topic_id varsa, topic_id'yi silebiliriz
            if (Schema::hasColumn('questions', 'topic_id')) {
                $table->dropColumn('topic_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            if (Schema::hasColumn('questions', 'explanation')) {
                $table->renameColumn('explanation', 'correct_answer');
            }
            $table->dropColumn([
                'question_type',
                'media_url',
                'order_index',
                'is_active'
            ]);
        });
    }
};
