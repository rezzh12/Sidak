<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',

            ],
            [
                'id' => 2,
                'name' => 'Kades',

            ],
            [
                'id' => 3,
                'name' => 'rt',
            ]
        ];

        foreach ($roles as $key => $role) {
            Roles::create($role);
        }
    }
}
