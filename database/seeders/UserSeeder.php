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
        $user_count = (int)$this->command->ask('how Many users would you like ?',20);

        User::factory($user_count)->create();
    }
}
