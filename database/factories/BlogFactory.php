<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl(),
            'content' => $this->faker->paragraph,
            'slug' => Str::slug($this->faker->sentence),
        ];
    }
}
