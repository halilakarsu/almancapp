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
        Schema::table('answers', function (Blueprint $table) {
            if (!Schema::hasColumn('answers', 'answer_text')) {
                $table->text('answer_text')->nullable();
            }
            if (!Schema::hasColumn('answers', 'is_correct')) {
                $table->boolean('is_correct')->default(false);
            }
            if (!Schema::hasColumn('answers', 'question_id')) {
                $table->foreignId('question_id')->nullable()->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('answers', 'explanation')) {
                $table->text('explanation')->nullable();
            }
            if (!Schema::hasColumn('answers', 'order_index')) {
                $table->integer('order_index')->default(0);
            }
            if (!Schema::hasColumn('answers', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn([
                'answer_text',
                'is_correct',
                'question_id',
                'explanation',
                'order_index',
                'is_active'
            ]);
        });
    }
};
