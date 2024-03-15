<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa jenis layanan konstruksi yang ditawarkan oleh perusahaan Anda?',
                'answer' => 'Kami menawarkan berbagai layanan konstruksi mulai dari renovasi rumah, pembangunan gedung, konstruksi jembatan, hingga proyek infrastruktur besar seperti pembangunan jalan dan jembatan.',
            ],
            [
                'question' => 'Berapa lama pengalaman perusahaan Anda dalam industri konstruksi?',
                'answer' => 'Perusahaan kami telah beroperasi dalam industri konstruksi selama lebih dari 20 tahun. Selama rentang waktu tersebut, kami telah menyelesaikan berbagai proyek dengan beragam skala dan kompleksitas.',
            ],
            [
                'question' => 'Apakah perusahaan Anda memiliki lisensi dan sertifikasi yang diperlukan?',
                'answer' => 'Ya, kami memiliki semua lisensi dan sertifikasi yang diperlukan untuk beroperasi dalam industri konstruksi. Tim kami terdiri dari profesional yang berpengalaman dan berkualifikasi.',
            ],
            [
                'question' => 'Bagaimana proses kerja perusahaan Anda?',
                'answer' => 'Proses kerja kami dimulai dari konsultasi dengan klien untuk memahami kebutuhan mereka secara mendalam, merancang solusi yang tepat, hingga pelaksanaan proyek dengan standar kualitas tertinggi. Kami juga terus berkomunikasi dengan klien selama seluruh proses proyek.',
            ],
            [
                'question' => 'Apakah Anda menyediakan layanan konsultasi atau estimasi gratis?',
                'answer' => 'Ya, kami menyediakan layanan konsultasi dan estimasi gratis kepada calon klien kami. Kami percaya bahwa memahami kebutuhan dan ekspektasi klien adalah langkah pertama yang penting dalam memulai proyek konstruksi yang sukses.',
            ],
        ];

        foreach ($faqs as $faq) {
            $newFaq = new FrequentlyAskedQuestion();
            $newFaq->question = $faq['question'];
            $newFaq->answer = $faq['answer'];
            $newFaq->save();
        }
    }
}
