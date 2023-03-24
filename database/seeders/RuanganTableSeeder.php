<?php

namespace Database\Seeders;

use App\Models\ruang;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'id' => 1,
                'lantai' => '4',
                'ruang' => '01',
                'kode' => 'L4-01'
            ],
            [
                'id' => 2,
                'lantai' => '4',
                'ruang' => '02',
                'kode' => 'L4-02'
            ],
            [
                'id' => 3,
                'lantai' => '4',
                'ruang' => '03',
                'kode' => 'L4-03'
            ],
            [
                'id' => 4,
                'lantai' => '4',
                'ruang' => '04',
                'kode' => 'L4-04'
            ],
            [
                'id' => 5,
                'lantai' => '4',
                'ruang' => '05',
                'kode' => 'L4-05'
            ],
            [
                'id' => 6,
                'lantai' => '4',
                'ruang' => '06',
                'kode' => 'L4-06'
            ],
            [
                'id' => 7,
                'lantai' => '4',
                'ruang' => '07',
                'kode' => 'L4-07'
            ],
            [
                'id' => 8,
                'lantai' => '4',
                'ruang' => '08',
                'kode' => 'L4-08'
            ],
            [
                'id' => 9,
                'lantai' => '4',
                'ruang' => '09',
                'kode' => 'L4-09'
            ],
            [
                'id' => 10,
                'lantai' => '4',
                'ruang' => '10',
                'kode' => 'L4-10'
            ],
            [
                'id' => 11,
                'lantai' => '4',
                'ruang' => '11',
                'kode' => 'L4-11'
            ],
            [
                'id' => 12,
                'lantai' => '4',
                'ruang' => '12',
                'kode' => 'L4-12'
            ],
            [
                'id' => 13,
                'lantai' => '4',
                'ruang' => '13',
                'kode' => 'L4-13'
            ],
            [
                'id' => 14,
                'lantai' => '4',
                'ruang' => '14',
                'kode' => 'L4-14'
            ],
            [
                'id' => 15,
                'lantai' => '4',
                'ruang' => '15',
                'kode' => 'L4-15'
            ],
            [
                'id' => 16,
                'lantai' => '4',
                'ruang' => '16',
                'kode' => 'L4-16'
            ],
        ];

        Ruangan::insert($rooms);
    }
}
