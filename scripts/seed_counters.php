<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Counter;

Counter::truncate();

$counters = [
    // Top Section (About Us)
    [
        'title' => 'Countries',
        'count_number' => '9+',
        'image' => null,
        'type' => 'top',
        'color' => null,
        'order' => 1,
        'is_active' => 1,
    ],
    [
        'title' => 'Students',
        'count_number' => '10,000+',
        'image' => null,
        'type' => 'top',
        'color' => null,
        'order' => 2,
        'is_active' => 1,
    ],
    [
        'title' => 'Year Experience',
        'count_number' => '26+',
        'image' => null,
        'type' => 'top',
        'color' => null,
        'order' => 3,
        'is_active' => 1,
    ],
    // Bottom Section (Modern Cards)
    [
        'title' => 'Projects Done',
        'count_number' => '50+',
        'image' => 'done.jpg',
        'type' => 'bottom',
        'color' => 'orange',
        'order' => 1,
        'is_active' => 1,
    ],
    [
        'title' => 'Our Staff',
        'count_number' => '16+',
        'image' => 'staf.png',
        'type' => 'bottom',
        'color' => 'green',
        'order' => 2,
        'is_active' => 1,
    ],
    [
        'title' => 'Trusted Clients',
        'count_number' => '50+',
        'image' => 'trust.jpg',
        'type' => 'bottom',
        'color' => 'blue',
        'order' => 3,
        'is_active' => 1,
    ],
    [
        'title' => 'Satisfied Clients',
        'count_number' => '40+',
        'image' => 'satisfied.jpg',
        'type' => 'bottom',
        'color' => 'purple',
        'order' => 4,
        'is_active' => 1,
    ],
];

foreach ($counters as $data) {
    Counter::create($data);
}

echo "Successfully seeded " . Counter::count() . " counters into database.\n";
