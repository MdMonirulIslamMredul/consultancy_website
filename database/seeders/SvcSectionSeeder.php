<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SvcSection;

class SvcSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            SvcSection::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
