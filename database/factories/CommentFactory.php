<?php

namespace Database\Factories;

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
            'text_body' => $this->faker->realText(150),
            'article_id' => random_int(1, 250),
            'user_id' => random_int(1, 200),
        ];
    }
}
