<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('questions', function (Blueprint $table) {
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::table('tests', function (Blueprint $table) {
            $table->foreignId('lesson_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
    }
};
