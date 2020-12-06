<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Administrator',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('admin'),
            ],
            [
                'name'      => 'Administrator Degovan',
                'email'     => 'admin.degovan@gmail.com',
                'password'  => Hash::make('degovan-admin'),
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
