<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
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
                'name' => 'Pemeliharaan Bangunan',
                'slug' => 'pemeliharaan-bangunan',
            ],
            [
                'name' => 'Keberlanjutan',
                'slug' => 'keberlanjutan',
            ],
            [
                'name' => 'Bahan Bangunan',
                'slug' => 'bahan-bangunan',
            ],
            [
                'name' => 'Konstruksi Rumah',
                'slug' => 'konstruksi-rumah',
            ],
            [
                'name' => 'Perencanaan Bangunan',
                'slug' => 'perencanaan-bangunan',
            ],
            [
                'name' => 'Hukum Konstruksi',
                'slug' => 'hukum-konstruksi',
            ],
            [
                'name' => 'Keselamatan Kerja',
                'slug' => 'keselamatan-kerja',
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new BlogTag();
            $newTag->name = $tag['name'];
            $newTag->slug = $tag['slug'];
            $newTag->save();
        }
    }
}
