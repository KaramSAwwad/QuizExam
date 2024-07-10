<?php

namespace Modules\Student\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Student\Models\Student;

class StudentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Ward Misan',
                'student_number' => 'ST'.rand(0,99).str()->random(3),
                'mobile' => '091001000',
                'gender' => 'female',
                'avatar' => null,
                'password' => Hash::make('ward1994'),
            ],
            [
                'name' => 'Jalal Hasan',
                'student_number' => 'ST'.rand(0,99).str()->random(3),
                'mobile' => '092002000',
                'gender' => 'male',
                'avatar' => null,
                'password' => Hash::make('jalalhoms15'),
            ],
            [
                'name' => 'ALi Amin',
                'student_number' => 'ST'.rand(0,99).str()->random(3),
                'mobile' => '093003000',
                'gender' => 'male',
                'avatar' => null,
                'password' => Hash::make('alima4515'),
            ],
            [
                'name' => 'Hanan Bagdady',
                'student_number' => 'ST'.rand(0,99).str()->random(3),
                'mobile' => '094004000',
                'gender' => 'female',
                'avatar' => null,
                'password' => Hash::make('hanan785'),
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
