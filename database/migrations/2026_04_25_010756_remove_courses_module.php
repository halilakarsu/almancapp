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
        Schema::dropIfExists('courses');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('level');
            $table->integer('order_index')->default(0);
            $table->string('slug');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade');
        });
    }
};
