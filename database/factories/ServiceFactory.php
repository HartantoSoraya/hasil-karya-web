<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'slug' => Str::slug($this->faker->name()),
        ];
    }
}
