<?php

namespace App\Interfaces;

interface BannerRepositoryInterface
{
    public function getAllBanner();

    public function getBannerById(string $id);

    public function createBanner(array $data);

    public function updateBanner(array $data, string $id);

    public function deleteBanner(string $id);
}
