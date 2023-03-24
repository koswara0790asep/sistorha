<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;

class ProgramStudiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodis = [
            [
                'prodi_id' => 1,
                'program_studi' => 'Teknik Mesin',
                'kode_prodi' => 'TM',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 2,
                'program_studi' => 'Teknik Sipil',
                'kode_prodi' => 'TS',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 3,
                'program_studi' => 'Mesin Otomotif',
                'kode_prodi' => 'MO',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 4,
                'program_studi' => 'Teknik Elektronika',
                'kode_prodi' => 'TE',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 5,
                'program_studi' => 'Teknik Komputer',
                'kode_prodi' => 'TK',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 6,
                'program_studi' => 'Akuntansi',
                'kode_prodi' => 'AK',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 7,
                'program_studi' => 'Teknik Kimia',
                'kode_prodi' => 'KM',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 8,
                'program_studi' => 'Teknik Otomasi',
                'kode_prodi' => 'TOS',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 9,
                'program_studi' => 'Komputerisasi Akuntansi',
                'kode_prodi' => 'KA',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 10,
                'program_studi' => 'Teknik Informatika',
                'kode_prodi' => 'TI',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 11,
                'program_studi' => 'Mekanik Industri & Desain',
                'kode_prodi' => 'MID',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 12,
                'program_studi' => 'Konstruksi Bangunan',
                'kode_prodi' => 'KB',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 13,
                'program_studi' => 'Rekam Medik dan Informasi Kesehatan',
                'kode_prodi' => 'RMIK',
                'status' => 'Aktif',
            ],
            [
                'prodi_id' => 14,
                'program_studi' => 'Teknik Otomotif',
                'kode_prodi' => 'TOF',
                'status' => 'Aktif',
            ],
        ];

        ProgramStudi::insert($prodis);
    }
}
