<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Add spaced repetition columns to words table
        Schema::table('words', function (Blueprint $table) {
            if (!Schema::hasColumn('words', 'difficulty')) {
                $table->tinyInteger('difficulty')->default(3)->comment('1=very easy, 5=very hard');
            }
            if (!Schema::hasColumn('words', 'repetitions')) {
                $table->integer('repetitions')->default(0)->comment('Times this word has been reviewed');
            }
            if (!Schema::hasColumn('words', 'ease_factor')) {
                $table->float('ease_factor', 4, 2)->default(2.50)->comment('SM-2 ease factor, min 1.3');
            }
            if (!Schema::hasColumn('words', 'interval_days')) {
                $table->integer('interval_days')->default(1)->comment('Current review interval in days');
            }
            if (!Schema::hasColumn('words', 'next_review_at')) {
                $table->timestamp('next_review_at')->nullable()->comment('Next review datetime');
            }
            if (!Schema::hasColumn('words', 'last_reviewed_at')) {
                $table->timestamp('last_reviewed_at')->nullable();
            }
            // Tag words by topic for cross-lesson reuse tracking
            if (!Schema::hasColumn('words', 'topic_tags')) {
                $table->json('topic_tags')->nullable()->comment('Array of topic slugs this word appears in');
            }
            if (!Schema::hasColumn('words', 'frequency_rank')) {
                $table->integer('frequency_rank')->nullable()->comment('Goethe/TELC frequency rank, lower = more common');
            }
        });

        // 2. Create user_word_progress table for per-user spaced repetition
        if (!Schema::hasTable('user_word_progress')) {
            Schema::create('user_word_progress', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('word_id')->constrained('words')->onDelete('cascade');
                $table->tinyInteger('quality')->default(0)->comment('0-5: quality of last response (SM-2)');
                $table->integer('repetitions')->default(0);
                $table->float('ease_factor', 4, 2)->default(2.50);
                $table->integer('interval_days')->default(1);
                $table->timestamp('next_review_at')->nullable();
                $table->timestamp('last_reviewed_at')->nullable();
                $table->boolean('is_learned')->default(false);
                $table->timestamps();
                $table->unique(['user_id', 'word_id']);
                $table->index(['user_id', 'next_review_at']);
            });
        }

        // 3. Add lesson_id directly to words (current schema uses topic_id via old topics table)
        // Add lesson_id if not present, as the new architecture is Level > Lesson > Word
        if (!Schema::hasColumn('words', 'lesson_id')) {
            Schema::table('words', function (Blueprint $table) {
                $table->foreignId('lesson_id')->nullable()->constrained('lessons')->onDelete('cascade');
            });
        }

        // 4. Add cross-reference to exercise_items so we know which words they reinforce
        if (!Schema::hasColumn('exercise_items', 'reinforced_word_ids')) {
            Schema::table('exercise_items', function (Blueprint $table) {
                $table->json('reinforced_word_ids')->nullable()->comment('Word IDs from this lesson used in this sentence');
            });
        }
    }

    public function down(): void
    {
        Schema::table('words', function (Blueprint $table) {
            $table->dropColumn([
                'difficulty', 'repetitions', 'ease_factor', 'interval_days',
                'next_review_at', 'last_reviewed_at', 'topic_tags', 'frequency_rank'
            ]);
        });

        Schema::dropIfExists('user_word_progress');

        if (Schema::hasColumn('words', 'lesson_id')) {
            Schema::table('words', function (Blueprint $table) {
                $table->dropForeign(['lesson_id']);
                $table->dropColumn('lesson_id');
            });
        }

        if (Schema::hasColumn('exercise_items', 'reinforced_word_ids')) {
            Schema::table('exercise_items', function (Blueprint $table) {
                $table->dropColumn('reinforced_word_ids');
            });
        }
    }
};
