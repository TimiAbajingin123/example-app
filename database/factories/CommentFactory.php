<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake() -> numberBetween(1, 21),
            //'post_id' => fake() ->numberBetween(1, 6),
            'content' => fake() -> sentence,
            'commentable_type' => 'App\Models\Post',
            'commentable_id' => fake() ->numberBetween(1, 6),
        ];
    }
}
