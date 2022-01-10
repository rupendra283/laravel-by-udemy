<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->word(),
            'content'   => $this->faker->sentence(20),
            'slug'   => $this->faker->unique()->sentence(20),
            'created_by' => User::factory(1)->create()->first(),

        ];
    }
}
