<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogCategories = [
            [
                'name' => 'Manajemen Proyek',
                'slug' => 'manajemen-proyek',
            ],
            [
                'name' => 'Teknologi Konstruksi',
                'slug' => 'teknologi-konstruksi',
            ],
            [
                'name' => 'Desain Arsitektur',
                'slug' => 'desain-arsitektur',
            ],
            [
                'name' => 'Keberlanjutan Bangunan',
                'slug' => 'keberlanjutan-bangunan',
            ],
            [
                'name' => 'Hukum Konstruksi',
                'slug' => 'hukum-konstruksi',
            ],
        ];

        foreach ($blogCategories as $blogCategory) {
            $newBlogCategory = new BlogCategory();
            $newBlogCategory->name = $blogCategory['name'];
            $newBlogCategory->slug = $blogCategory['slug'];
            $newBlogCategory->save();
        }
    }
}
