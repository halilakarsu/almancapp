<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── CARDS table ──────────────────────────────────────────────────────────
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->onDelete('cascade');
            $table->string('type')->default('word'); // 'word' | 'sentence'
            $table->text('german_content');           // Almanca içerik
            $table->text('turkish_content');          // Türkçe anlam
            $table->string('image')->nullable();      // opsiyonel görsel (path)
            $table->string('audio')->nullable();      // opsiyonel ses (path)
            $table->tinyInteger('difficulty')->default(1)->comment('1=kolay, 2=orta, 3=zor');
            $table->boolean('is_active')->default(true);
            $table->integer('order_index')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        // ── USER_CARD_PROGRESS table ─────────────────────────────────────────────
        Schema::create('user_card_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('card_id')->constrained('cards')->onDelete('cascade');

            // Status: new | learning | known
            $table->string('status')->default('new');

            // Stats
            $table->integer('correct_count')->default(0);
            $table->integer('wrong_count')->default(0);
            $table->timestamp('last_seen_at')->nullable();

            // SM-2 Spaced Repetition
            $table->integer('repetitions')->default(0);
            $table->float('ease_factor', 4, 2)->default(2.50);
            $table->integer('interval_days')->default(1);
            $table->timestamp('next_review_at')->nullable();

            $table->unique(['user_id', 'card_id']);
            $table->index(['user_id', 'next_review_at']);
            $table->index(['user_id', 'status']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_card_progress');
        Schema::dropIfExists('cards');
    }
};
