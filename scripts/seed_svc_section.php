<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SvcSection;
use App\Models\Content\Setting;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Auth;

$user = User::first();
if ($user) {
    Auth::login($user);
}

SvcSection::truncate();

$items = [
    [
        'icon' => 'fa-regular fa-lightbulb',
        'title' => 'INTERACTIVE STUDENT CONSULTATION',
        'description' => 'Through personalized consultations, we help students secure placement at their ideal institution based on academic credentials.',
        'order' => 1,
        'is_active' => 1,
    ],
    [
        'icon' => 'fa-solid fa-passport',
        'title' => 'VISA APPLICATION HANDLING',
        'description' => 'We provide complete visa application guidelines and support once offer letters are awarded to students.',
        'order' => 2,
        'is_active' => 1,
    ],
    [
        'icon' => 'fa-solid fa-file-circle-check',
        'title' => 'POST-APPROVAL COUNSELING SUPPORT',
        'description' => 'After visa approval, we guide students on arrival procedures, travel plans, and accommodation arrangements.',
        'order' => 3,
        'is_active' => 1,
    ],
    [
        'icon' => 'fa-solid fa-graduation-cap',
        'title' => 'PROMOTING EDUCATION OPPORTUNITIES',
        'description' => 'We host seminars with foreign institutions in Bangladesh and arrange direct student interviews.',
        'order' => 4,
        'is_active' => 1,
    ],
];

foreach ($items as $data) {
    SvcSection::create($data);
}

$sectionSettings = [
    'svc_section_title' => 'OUR SERVICES',
    'svc_section_btn_text' => 'VIEW SERVICES',
    'svc_section_btn_link' => '#',
];
Setting::save_settings($sectionSettings);

echo "Successfully seeded " . SvcSection::count() . " service cards into svc_sections table.\n";
