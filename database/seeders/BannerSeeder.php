<?php

namespace Database\Seeders;

use App\Helpers\ImageHelper\ImageHelper;
use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageHelper = new ImageHelper();

        $banners = [
            [
                'image' => $imageHelper->createDummyImageWithTextSizeAndPosition(1920, 821, 'top-center'),
                'title' => 'Kami Hanya Melakukan Apa yang Kami Kuasai',
                'subtitle' => 'Seorang percetakan tidak dikenal mengambil gali dari jenis dan mengacaknya untuk membuat sebuah buku spesimen jenis.',
                'url' => Banner::factory()->make()->url,
                'text_url' => 'Lihat Proyek',
            ],
            [
                'image' => $imageHelper->createDummyImageWithTextSizeAndPosition(1920, 821, 'top-center'),
                'title' => 'Solusi Konstruksi untuk Masa Depan',
                'subtitle' => 'Dengan inovasi terbaru, kami memberikan solusi terbaik untuk kebutuhan konstruksi Anda.',
                'url' => Banner::factory()->make()->url,
                'text_url' => 'Lihat Layanan Kami',
            ],
            [
                'image' => $imageHelper->createDummyImageWithTextSizeAndPosition(1920, 821, 'top-center'),
                'title' => 'Keandalan dan Kualitas Terbaik',
                'subtitle' => 'Dipercayakan oleh klien-klien kami, kami berkomitmen untuk memberikan yang terbaik dalam setiap proyek.',
                'url' => Banner::factory()->make()->url,
                'text_url' => 'Pelajari',
            ],
        ];

        foreach ($banners as $banner) {
            $newBanner = new Banner();
            $newBanner->image = $banner['image']->store('assets/banners', 'public');
            $newBanner->title = $banner['title'];
            $newBanner->subtitle = $banner['subtitle'];
            $newBanner->url = $banner['url'];
            $newBanner->text_url = $banner['text_url'];
            $newBanner->save();
        }
    }
}
