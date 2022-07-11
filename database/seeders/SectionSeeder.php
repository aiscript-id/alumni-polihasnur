<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'A',
                'name' => 'Data Pribadi',
            ],
            [
                'code' => 'B',
                'name' => 'Riwayat Pendidikan',
            ],
            [
                'code' => 'C',
                'name' => 'Riwayat Pekerjaan',
            ],
            [
                'code' => 'D',
                'name' => 'Relevansi Pekerjaan dan Pendidikan',
            ],
            [
                'code' => 'E',
                'name' => 'Pengalaman Pembelajaran',
            ],
            [
                'code' => 'F',
                'name' => 'Indikator Kompetensi Lulusan',
            ]

        ];

        foreach ($data as $key => $value) {
            Section::create($value);
        }

    }
}
