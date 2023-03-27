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
                'program_studi' => 'Teknik Mesin',
                'kode' => 'TM',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Sipil',
                'kode' => 'TS',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Mesin Otomotif',
                'kode' => 'MO',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Elektronika',
                'kode' => 'TE',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Komputer',
                'kode' => 'TK',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Akuntansi',
                'kode' => 'AK',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Kimia',
                'kode' => 'KM',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Otomasi',
                'kode' => 'TOS',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Komputerisasi Akuntansi',
                'kode' => 'KA',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Informatika',
                'kode' => 'TI',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Mekanik Industri & Desain',
                'kode' => 'MID',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Konstruksi Bangunan',
                'kode' => 'KB',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Rekam Medik dan Informasi Kesehatan',
                'kode' => 'RMIK',
                'status' => 'Aktif',
            ],
            [
                'program_studi' => 'Teknik Otomotif',
                'kode' => 'TOF',
                'status' => 'Aktif',
            ],
        ];

        ProgramStudi::insert($prodis);
    }
}
