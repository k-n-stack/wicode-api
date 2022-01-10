<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase(),
            'description' => $this->faker->realText(30),
            'text_body' => $this->faker->realText(100),
            'image' => $this->faker->image(),
            'is_valid' => $this->faker->boolean(),
            'user_id' => random_int(2, 200),
        ];
    }
}
