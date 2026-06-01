<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('test_description');
        });

        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests')->onDelete('cascade');
            $table->string('question');
            $table->string('answer');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sets');

        Schema::table('tests', function (Blueprint $table) {
            $table->text('test_description')->nullable();
        });
    }
};
