<?php

$migrations = [
    'create_courses_table' => <<<'EOD'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
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
    }
    public function down(): void {
        Schema::dropIfExists('courses');
    }
};
EOD,
    'create_topics_table' => <<<'EOD'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('order_index')->default(0);
            $table->string('slug');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('topics');
    }
};
EOD,
    'create_questions_table' => <<<'EOD'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('german_question');
            $table->string('turkish_meaning');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('questions');
    }
};
EOD,
    'create_tests_table' => <<<'EOD'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_title');
            $table->text('test_description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('tests');
    }
};
EOD,
];

foreach($migrations as $name => $content) {
    $filename = date('Y_m_d_His') . '_' . $name . '.php';
    sleep(1);
    file_put_contents(__DIR__ . '/database/migrations/' . $filename, $content);
    echo "Created migration: {$name}\n";
}
