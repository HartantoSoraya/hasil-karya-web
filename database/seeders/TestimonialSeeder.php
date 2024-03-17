<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Doe',
                'title' => 'Penanganan Profesional',
                'subtitle' => 'Saya sangat terkesan dengan profesionalisme tim konstruksi ini. Mereka menangani proyek saya dengan sangat baik dan hasilnya melebihi harapan saya.',
            ],
            [
                'name' => 'Jane Smith',
                'title' => 'Pelayanan yang Luar Biasa',
                'subtitle' => 'Pelayanan yang luar biasa! Mereka sangat responsif terhadap kebutuhan saya dan memberikan solusi yang tepat waktu. Saya sangat merekomendasikan layanan mereka.',
            ],
            [
                'name' => 'Michael Johnson',
                'title' => 'Sangat Direkomendasikan',
                'subtitle' => 'Saya sangat puas dengan hasil kerja tim ini. Mereka bekerja dengan teliti dan mengutamakan kualitas. Sangat direkomendasikan!',
            ],
            [
                'name' => 'Sarah Lee',
                'title' => 'Pengalaman yang Luar Biasa',
                'subtitle' => 'Pengalaman yang luar biasa! Mereka tidak hanya memberikan hasil yang berkualitas tetapi juga memastikan bahwa saya terlibat dalam setiap langkah dari proyek ini.',
            ],
            [
                'name' => 'David Brown',
                'title' => 'Kerja Luar Biasa',
                'subtitle' => 'Kerja luar biasa! Tim ini memberikan hasil yang melebihi ekspektasi saya. Saya sangat senang dengan layanan yang diberikan dan akan merekomendasikannya kepada semua orang.',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            $newTestimonial = new Testimonial;
            $newTestimonial->name = $testimonial['name'];
            $newTestimonial->title = $testimonial['title'];
            $newTestimonial->subtitle = $testimonial['subtitle'];
            $newTestimonial->save();
        }
    }
}
