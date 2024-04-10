<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail1.jpg'),
                'name' => 'Desain Arsitektur',
                'description' => 'Layanan ini mencakup desain arsitektur untuk proyek bangunan baru, renovasi, atau perencanaan ulang. Tim arsitek akan membuat rencana dan gambar-gambar teknis yang diperlukan untuk memulai konstruksi.',
                'slug' => 'desain-arsitektur',
            ],
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail2.jpg'),
                'name' => 'Konstruksi Bangunan',
                'description' => 'Layanan ini mencakup konstruksi bangunan fisik berdasarkan rencana arsitektur dan spesifikasi teknis yang telah disetujui. Tim konstruksi akan bertanggung jawab untuk membangun bangunan sesuai dengan standar kualitas dan keselamatan yang diharapkan.',
                'slug' => 'konstruksi-bangunan',
            ],
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail3.jpg'),
                'name' => 'Manajemen Proyek',
                'description' => 'Layanan manajemen proyek melibatkan perencanaan, pengorganisasian, dan pengawasan semua aspek proyek konstruksi. Ini termasuk pengelolaan sumber daya manusia, anggaran, jadwal, dan pemecahan masalah selama pelaksanaan proyek.',
                'slug' => 'manajemen-proyek',
            ],
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail4.jpg'),
                'name' => 'Pemeliharaan Bangunan',
                'description' => 'Setelah selesai konstruksi, layanan pemeliharaan bangunan penting untuk memastikan bahwa bangunan tetap berfungsi dengan baik dan terawat. Ini mencakup pembersihan rutin, perawatan sistem mekanis, dan perbaikan jika diperlukan.',
                'slug' => 'pemeliharaan-bangunan',
            ],
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail5.jpg'),
                'name' => 'Perencanaan Lingkungan',
                'description' => 'Layanan ini berkaitan dengan perencanaan dan penilaian dampak lingkungan dari proyek konstruksi. Ini termasuk penilaian dampak lingkungan, pengelolaan limbah konstruksi, dan pemantauan selama fase konstruksi.',
                'slug' => 'perencanaan-lingkungan',
            ],
            [
                'thumbnail' => UploadedFile::fake()->image('thumbnail6.jpg'),
                'name' => 'Perizinan Bangunan',
                'description' => 'Layanan perizinan bangunan mencakup semua proses yang diperlukan untuk mendapatkan izin dan persetujuan yang diperlukan dari otoritas setempat. Ini termasuk pengajuan dokumen, pemeriksaan, dan koordinasi dengan pihak berwenang.',
                'slug' => 'perizinan-bangunan',
            ],
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->thumbnail = $service['thumbnail']->store('assets/services/thumbnails', 'public');
            $newService->name = $service['name'];
            $newService->description = $service['description'];
            $newService->slug = $service['slug'];
            $newService->save();

            for ($i = 0; $i < rand(1, 5); $i++) {
                $serviceImage = new ServiceImage();
                $serviceImage->service_id = $newService->id;
                $serviceImage->image = UploadedFile::fake()->image('service.jpg')->store('assets/services/images', 'public');
                $serviceImage->save();
            }
        }
    }
}
