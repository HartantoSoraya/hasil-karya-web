<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'title' => UploadedFile::fake()->image('banner.jpg')->name,
            'subtitle' => $this->faker->sentence(),
            'url' => $this->faker->url(),
            'text_url' => $this->faker->sentence(),
        ];
    }
}
