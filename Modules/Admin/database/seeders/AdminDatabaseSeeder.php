<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Modules\Admin\Models\Admin;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'karam awwad',
                'email' => 'karam@yahoo.com',
                'password' => Hash::make('password'),

            ],
            [
                'name' => 'Zain Ghanem',
                'email' => 'zain@yahoo.com',
                'password' => Hash::make('password'),

            ],

        ];
        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
