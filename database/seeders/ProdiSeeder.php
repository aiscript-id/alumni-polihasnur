<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
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
                'name'  => 'D3 Teknik Informatika',
                'slug'  => 'd3-teknik-informatika',
                'description' => 'D3 Teknik Informatika',
            ],
            [
                'name'  => 'D3 Teknik Otomotif',
                'slug'  => 'd3-teknik-otomotif',
                'description' => 'D3 Teknik Otomotif',
            ],
            [
                'name'  => 'D3 Budidaya Tanaman Perkebunan',
                'slug'  => 'd3-budidaya-tanaman-perkebunan',
                'description' => 'D3 Budidaya Tanaman Perkebunan',
            ]
        ];

        foreach ($data as $key => $value) {
            Prodi::create($value);
        }
    }
}
