<?php

namespace Modules\Teacher\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Modules\Teacher\Models\Teacher;
use function Laravel\Prompts\password;

class TeacherDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Jaafar Ghanom',
                'email' => 'jaafar@gmail.com',
                'password' => Hash::make(12345678),
                'teacher_number' => 'TE'.rand(0,99).str()->random(3),
                'mobile' => '09000000000',
                'speciality_id' => 4,
            ],
            [
                'name' => 'Ahmad Nader',
                'email' => 'ahmad@gmail.com',
                'password' => Hash::make(789465132),
                'teacher_number' => 'TE'.rand(0,99).str()->random(3),
                'mobile' => '09111111111',
                'speciality_id' => 2,
            ],
            [
                'name' => 'Nour Rasol',
                'email' => 'nour@gmail.com',
                'password' => Hash::make('asjkd4588'),
                'teacher_number' => 'TE'.rand(0,99).str()->random(3),
                'mobile' => '09222222222',
                'speciality_id' => 1,
            ],
            [
                'name' => 'Zain Wassof',
                'email' => 'zain@gmail.com',
                'password' => Hash::make('zainsdfhds55'),
                'teacher_number' => 'TE'.rand(0,99).str()->random(3),
                'mobile' => '09333333333',
                'speciality_id' => 3,
            ],
            [
                'name' => 'Hala Omer',
                'email' => 'hala@gmail.com',
                'password' => Hash::make('hala655'),
                'teacher_number' => 'TE'.rand(0,99).str()->random(3),
                'mobile' => '09444444444',
                'speciality_id' => 5,
            ],

        ];
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
