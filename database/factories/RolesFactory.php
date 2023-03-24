<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'id' => 1,
                'name' => 'akademik',
            ],
            [
                'id' => 2,
                'name' => 'prodi',
            ],
            [
                'id' => 3,
                'name' => 'dosen',
            ],
            [
                'id' => 4,
                'name' => 'mahasiswa',
            ],
        ];
    }
}
