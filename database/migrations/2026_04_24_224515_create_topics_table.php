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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('topic_title');
            $table->string('topic_slug')->nullable();
            $table->text('topic_description')->nullable();      
            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->integer('order_index')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
