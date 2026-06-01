<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('word_german');
            $table->string('word_turkish');
            $table->text('word_description')->nullable()->after('word_turkish');
            $table->integer('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
