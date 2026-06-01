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
        if (!Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('answer_text');
            $table->boolean('is_correct')->default(false);
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); 
            $table->integer('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('explanation')->nullable()->after('is_correct');      

        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
