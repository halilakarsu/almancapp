<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

use App\Models\Level;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$levels = Level::all();
foreach ($levels as $level) {
    $level->update(['level_image' => 'uploads/levels/' . $level->level_slug . '.png']);
}
echo "DB Updated\n";
