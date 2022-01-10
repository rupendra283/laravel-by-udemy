<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'super@admin.com',
            'is_admin' => 1,
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' =>  'Normal',
            'email'   => 'user@email.com',
            'is_admin'  => '0',
            'password' => Hash::make('password'),

        ]);
    }
}
