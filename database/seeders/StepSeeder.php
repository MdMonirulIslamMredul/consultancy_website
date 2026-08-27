<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Step;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = [
            // Row 1 (Steps 01-05)
            [
                'step_num' => '01',
                'title' => 'SELECT A COURSE',
                'icon' => 'fa-regular fa-file-lines',
                'color_gradient' => 'linear-gradient(135deg,#e07a5f,#f4a261)',
                'row_position' => 1,
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'step_num' => '02',
                'title' => 'APPLY TO A UNIVERSITY',
                'icon' => 'fa-solid fa-hand-pointer',
                'color_gradient' => 'linear-gradient(135deg,#6c757d,#adb5bd)',
                'row_position' => 1,
                'order' => 2,
                'is_active' => 1,
            ],
            [
                'step_num' => '03',
                'title' => 'APPLY FOR SCHOLARSHIP',
                'icon' => 'fa-regular fa-file-alt',
                'color_gradient' => 'linear-gradient(135deg,#e63946,#f4845f)',
                'row_position' => 1,
                'order' => 3,
                'is_active' => 1,
            ],
            [
                'step_num' => '04',
                'title' => 'RECEIVE THE OFFER LETTER',
                'icon' => 'fa-regular fa-envelope-open',
                'color_gradient' => 'linear-gradient(135deg,#9b2335,#c0392b)',
                'row_position' => 1,
                'order' => 4,
                'is_active' => 1,
            ],
            [
                'step_num' => '05',
                'title' => 'PAY TUITION FEE & RECEIVE THE FEE RECEIPT',
                'icon' => 'fa-solid fa-receipt',
                'color_gradient' => 'linear-gradient(135deg,#165b65,#1e8a98)',
                'row_position' => 1,
                'order' => 5,
                'is_active' => 1,
            ],
            // Row 2 (Steps 06-10)
            [
                'step_num' => '06',
                'title' => 'RECEIVE LOA (LETTER OF ACCEPTANCE)',
                'icon' => 'fa-solid fa-hand-holding-heart',
                'color_gradient' => 'linear-gradient(135deg,#165b65,#1e8a98)',
                'row_position' => 2,
                'order' => 6,
                'is_active' => 1,
            ],
            [
                'step_num' => '07',
                'title' => 'SCHEDULE IME (IMMIGRATION MEDICAL EXAMINATION)',
                'icon' => 'fa-solid fa-stethoscope',
                'color_gradient' => 'linear-gradient(135deg,#7b2d8b,#ab47bc)',
                'row_position' => 2,
                'order' => 7,
                'is_active' => 1,
            ],
            [
                'step_num' => '08',
                'title' => 'PREPARE FOR VISA FILING (SDS OR NON-SDS)',
                'icon' => 'fa-regular fa-folder-open',
                'color_gradient' => 'linear-gradient(135deg,#8bc34a,#558b2f)',
                'row_position' => 2,
                'order' => 8,
                'is_active' => 1,
            ],
            [
                'step_num' => '09',
                'title' => 'BIOMETRICS APPOINTMENT & INTERVIEW',
                'icon' => 'fa-solid fa-fingerprint',
                'color_gradient' => 'linear-gradient(135deg,#e07a5f,#f4a261)',
                'row_position' => 2,
                'order' => 9,
                'is_active' => 1,
            ],
            [
                'step_num' => '10',
                'title' => 'VISA OUTCOME',
                'icon' => 'fa-solid fa-stamp',
                'color_gradient' => 'linear-gradient(135deg,#165b65,#1e8a98)',
                'row_position' => 2,
                'order' => 10,
                'is_active' => 1,
            ],
        ];

        foreach ($steps as $data) {
            Step::updateOrCreate(
                ['step_num' => $data['step_num']],
                $data
            );
        }
    }
}
