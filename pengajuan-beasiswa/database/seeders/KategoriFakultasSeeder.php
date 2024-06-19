<?php

namespace Database\Seeders;

use App\Models\KategoriFakultas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Fakultas Biologi'],
            ['name' => 'Fakultas Ekonomi'],
            ['name' => 'Fakultas Farmasi'],
            ['name' => 'Fakultas Filsafat'],
            ['name' => 'Fakultas Geografi'],
            ['name' => 'Fakultas Hukum'],
            ['name' => 'Fakultas Ilmu Budaya'],
            ['name' => 'Fakultas Ilmu Sosial'],
            ['name' => 'Fakultas Kedokteran Gigi'],
            ['name' => 'Fakultas Kedokteran Hewan'],
            ['name' => 'Fakultas Kedokteran'],
            ['name' => 'Fakultas Kehutanan'],
            ['name' => 'Fakultas Matematika'],
            ['name' => 'Fakultas Pertanian'],
            ['name' => 'Fakultas Peternakan'],
            ['name' => 'Fakultas Psikologi'],
            ['name' => 'Fakultas Teknik'],
            ['name' => 'Fakultas Teknologi'],
        ];

        foreach ($data as $value) {
            KategoriFakultas::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
