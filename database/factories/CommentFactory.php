<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph(2),
            'created_by' => User::factory(1)->create()->first(),
            'post_id' => Post::factory(1)->create()->first(),
        ];
    }
}
