<?php

namespace Database\Seeders;

use App\Helpers\ImageHelper\ImageHelper;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageHelper = new ImageHelper();

        $projects = [
            [
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(480, 397, 'center'),
                'name' => 'Pembangunan Jembatan Raya Jaya',
                'slug' => 'pembangunan-jembatan-raya-jaya',
                'description' => 'Proyek pembangunan jembatan yang menghubungkan dua wilayah penting dalam kota.',
                'client' => 'Pemerintah Kota Jaya',
                'start_date' => '2023-07-01',
                'end_date' => '2024-03-31',
            ],
            [
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(480, 397, 'center'),
                'name' => 'Pembangunan Pusat Perbelanjaan Baru',
                'slug' => 'pembangunan-pusat-perbelanjaan-baru',
                'description' => 'Pembangunan pusat perbelanjaan modern dengan berbagai macam tenant terkenal.',
                'client' => 'PT Mall Indonesia',
                'start_date' => '2022-09-15',
                'end_date' => '2023-12-31',
            ],
            [
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(480, 397, 'center'),
                'name' => 'Pembangunan Lapangan Olahraga Utama',
                'slug' => 'pembangunan-lapangan-olahraga-utama',
                'description' => 'Proyek pembangunan lapangan olahraga utama yang akan menjadi pusat kegiatan olahraga di kota.',
                'client' => 'Dinas Pemuda dan Olahraga',
                'start_date' => '2023-02-01',
                'end_date' => '2023-10-31',
            ],
            [
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(480, 397, 'center'),
                'name' => 'Pembangunan Apartemen Taman Harmoni',
                'slug' => 'pembangunan-apartemen-taman-harmoni',
                'description' => 'Pembangunan apartemen dengan konsep taman yang nyaman dan harmonis.',
                'client' => 'PT Harmoni Indah',
                'start_date' => '2024-01-01',
                'end_date' => '2024-08-31',
            ],
            [
                'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(480, 397, 'center'),
                'name' => 'Renovasi Hotel Bintang Lima',
                'slug' => 'renovasi-hotel-bintang-lima',
                'description' => 'Renovasi total hotel berbintang lima untuk meningkatkan kualitas pelayanan dan fasilitas.',
                'client' => 'PT Hotel Sejahtera',
                'start_date' => '2022-11-01',
                'end_date' => '2023-06-30',
            ],
        ];

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->thumbnail = $project['thumbnail']->store('assets/projects/thumbnails', 'public');
            $newProject->name = $project['name'];
            $newProject->slug = $project['slug'];
            $newProject->description = $project['description'];
            $newProject->client = $project['client'];
            $newProject->start_date = $project['start_date'];
            $newProject->end_date = $project['end_date'];
            $newProject->save();

            for ($i = 0; $i < rand(1, 5); $i++) {
                $projectImage = new ProjectImage();
                $projectImage->project_id = $newProject->id;
                $projectImage->image = $imageHelper->createDummyImageWithTextSizeAndPosition(370, 240, 'center')->store('assets/projects/images', 'public');
                $projectImage->save();
            }

            $maxCategories = ProjectCategory::count();
            $categories = ProjectCategory::inRandomOrder()->limit(rand(1, $maxCategories))->get();
            $newProject->categories()->attach($categories);
        }
    }
}
