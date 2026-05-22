<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'name' => 'Jokowi',
                'nim' => '20142019',
                'email' => 'jokowi@gugel.com',
                'jurusan' => 'Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prabowo',
                'nim' => '20152020',
                'email' => 'prabowo@gugel.com',
                'jurusan' => 'Sistem Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anies',
                'nim' => '20162021',
                'email' => 'anies@gugel.com',
                'jurusan' => 'Teknik Komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
