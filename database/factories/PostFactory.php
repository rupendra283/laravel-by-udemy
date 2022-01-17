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
            'title'   => $this->faker->sentence(10),
            'content'   => $this->faker->paragraphs(5, true),
            'slug'   => $this->faker->unique()->sentence(20),
            'created_by' => User::factory(1)->create()->first(),
            'created_at'=> $this->faker->dateTimeBetween('-3 months'),


        ];
    }
}
