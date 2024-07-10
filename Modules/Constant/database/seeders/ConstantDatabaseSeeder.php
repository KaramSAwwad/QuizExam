<?php

namespace Modules\Constant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Constant\Models\Speciality;

class ConstantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            [
                'name' => 'Math',
                'code' => '001',
            ],
            [
                'name' => 'Physic',
                'code' => '002',
            ],
            [
                'name' => 'Language',
                'code' => '003',
            ],
            [
                'name' => 'Chemical',
                'code' => '004',
            ],
            [
                'name' => 'Programing',
                'code' => '005',
            ],

        ];

        foreach ($specialities as $speciality) {
            Speciality::create($speciality);
        }
    }
}
