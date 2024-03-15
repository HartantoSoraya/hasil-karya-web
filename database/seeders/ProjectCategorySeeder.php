<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'Tambang Minyak',
        ];

        foreach ($category as $item) {
            $project = new ProjectCategory();
            $project->name = $item;
            $project->slug = Str::slug($item);
            $project->save();
        }
    }
}
