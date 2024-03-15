<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            'Konstruksi',
            'Mekanikal',
            'Pengelasan',
            'Tambang Minyak'
        ];

        foreach ($category as $item) {
            Project::create([
                'name' => $item,
                'slug' => Str::slug($item)
            ]);
        }
    }
}
