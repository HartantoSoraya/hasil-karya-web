<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAllService()
    {
        return Service::all();
    }

    public function getServiceById(string $id)
    {
        return Service::findOrFail($id);
    }

    public function getServiceBySlug(string $slug)
    {
        return Service::where('slug', $slug)->first();
    }

    public function createService(array $data)
    {
        DB::beginTransaction();

        try {
            $service = new Service();
            $service->thumbnail = $data['thumbnail']->store('assets/services/thumbnails', 'public');
            $service->name = $data['name'];
            $service->description = $data['description'];
            $service->slug = $data['slug'];
            $service->save();

            if (isset($data['images'])) {
                foreach ($data['images'] as $image) {
                    $serviceImage = new ServiceImage();
                    $serviceImage->service_id = $service->id;
                    $serviceImage->image = $image->store('assets/services/images', 'public');
                    $serviceImage->save();
                }
            }

            DB::commit();

            return $service;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateService(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $service = Service::findOrFail($id);
            if ($data['thumbnail']) {
                $service->thumbnail = $this->updateThumbnail($service->thumbnail, $data['thumbnail']);
            }
            $service->name = $data['name'];
            $service->description = $data['description'];
            $service->slug = $data['slug'];
            $service->save();

            if (isset($data['images'])) {
                $this->deleteImages($service->id);

                foreach ($data['images'] as $image) {
                    $serviceImage = new ServiceImage();
                    $serviceImage->service_id = $service->id;
                    $serviceImage->image = $image->store('assets/services/images', 'public');
                    $serviceImage->save();
                }
            }

            DB::commit();

            return $service;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteService(string $id)
    {
        DB::beginTransaction();

        try {
            Service::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateThumbnail(string $oldImage, $newImage)
    {
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return $newImage->store('assets/services/thumbnails', 'public');
    }

    public function deleteImages(string $ServiceId)
    {
        $serviceImages = ServiceImage::where('service_id', $ServiceId)->get();

        foreach ($serviceImages as $image) {
            Storage::disk('public')->delete($image->image);
            ServiceImage::find($image->id)->delete();
        }
    }
}
