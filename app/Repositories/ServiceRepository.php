<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;
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
            if($data['thumbnail']) {
                $service->thumbnail = $this->updateImage($service->thumbnail, $data['thumbnail']);
            }
            $service->name = $data['name'];
            $service->description = $data['description'];
            $service->slug = $data['slug'];
            $service->save();

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

    public function updateImage(string $oldImage, $newImage)
    {
        if ($oldImage ) {
           Storage::disk('public')->delete($oldImage);
        }

        return $newImage->store('assets/services/thumbnails', 'public');
    }
}        