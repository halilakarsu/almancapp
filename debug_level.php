<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Level;
try {
    $level = Level::firstOrCreate([
        'level_title' => 'A1 Başlangıç Seviyesi'
    ], [
        'level_slug' => 'a1-baslangic-seviyesi',
        'level_description' => 'Test',
        'order_index' => 1,
        'is_active' => true
    ]);
    echo "Success: " . $level->id;
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
