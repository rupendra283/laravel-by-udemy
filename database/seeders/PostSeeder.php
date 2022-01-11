<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_count = (int)$this->command->ask('how Many post would you like ?',20);
        Post::factory($post_count)->create();
    }
}
