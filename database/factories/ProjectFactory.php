<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
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
            'name' => $this->faker->sentence(4),
            'slug' => Str::slug($this->faker->sentence(4)),
            'description' => $this->faker->paragraph(3),
            'client' => $this->faker->name,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
