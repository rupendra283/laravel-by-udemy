<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::all();

        if($post->count() === 0){
            $this->command->info('There Are No blog Post So no commentwill be added');
            return;
        }
        $comment_count = (int)$this->command->ask('how Many Comment would you like ?',150);
        Comment::factory($comment_count)->create();
    }
}
