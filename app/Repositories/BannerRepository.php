<?php

namespace App\Repositories;

use App\Interfaces\BannerRepositoryInterface;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerRepository implements BannerRepositoryInterface
{
    public function getAllBanner()
    {
        return Banner::all();
    }

    public function getBannerById(string $id)
    {
        return Banner::findOrFail($id);
    }

    public function createBanner(array $data)
    {
        DB::beginTransaction();

        try {
            $banner = new Banner();
            $banner->image = $data['image']->store('assets/banners', 'public');
            $banner->title = $data['title'];
            $banner->subtitle = $data['subtitle'];
            $banner->url = $data['url'];
            $banner->text_url = $data['text_url'];
            $banner->save();

            DB::commit();

            return $banner;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateBanner(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $banner = Banner::findOrFail($id);
            if ($data['image']) {
                $banner->image = $this->updateImage($banner->image, $data['image']);
            }
            $banner->title = $data['title'];
            $banner->subtitle = $data['subtitle'];
            $banner->url = $data['url'];
            $banner->text_url = $data['text_url'];
            $banner->save();

            DB::commit();

            return $banner;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteBanner(string $id)
    {
        DB::beginTransaction();

        try {
            Banner::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    private function updateImage($oldImage, $newImage)
    {
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return $newImage->store('assets/banners', 'public');
    }
}
