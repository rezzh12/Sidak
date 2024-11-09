<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'      => 'Kades',
                'username'  => 'Kades',
                'email'     => 'kades@gmail.com',
                'password'  => bcrypt('12345'),
                'roles_id'  => 2
            ],
            [
                'name'      => 'rt',
                'username'  => 'rt',
                'email'     => 'rt@gmail.com',
                'password'  => bcrypt('12345'),
                'roles_id'  => 3
            ],
            [
                'name'      => 'Admin',
                'username'  => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('12345'),
                'roles_id'  => 1
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
