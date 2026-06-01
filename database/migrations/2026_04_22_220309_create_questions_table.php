<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('questions', function (Blueprint $table) {

        // 1. lesson bağlantısı ekle (ZORUNLU)
        $table->foreignId('lesson_id')
            ->nullable()
            ->after('id')
            ->constrained()
            ->onDelete('cascade');

        // 2. mevcut alanları daha genel hale getiriyoruz
        $table->renameColumn('german_question', 'question_text');
        $table->renameColumn('turkish_meaning', 'explanation');

        // 3. question type ekle
        $table->string('question_type')
            ->default('multiple_choice')
            ->after('question_text');

        // 4. medya (dinleme / görsel)
        $table->text('media_url')->nullable()->after('question_type');

        // 5. sıralama
        $table->integer('order_index')->default(0);

        // 6. aktif/pasif
        $table->boolean('is_active')->default(true);
    });
}
    public function down(): void {
        Schema::dropIfExists('questions');
    }
};