<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AccountSeeder::class,

            BannerSeeder::class,
            ProjectCategorySeeder::class,
            ProjectSeeder::class,
            FAQSeeder::class,
            TestimonialSeeder::class,
            BlogTagSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
