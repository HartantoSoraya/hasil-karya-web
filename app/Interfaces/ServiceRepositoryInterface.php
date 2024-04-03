<?php

namespace App\Interfaces;

interface ServiceRepositoryInterface
{
    public function getAllService();

    public function getServiceById(string $id);

    public function getServiceBySlug(string $slug);

    public function createService(array $data);

    public function updateService(array $data, string $id);

    public function deleteService(string $id);
}
