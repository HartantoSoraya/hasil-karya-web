<?php

namespace App\Interfaces;

interface projectRepositoryInterface
{
    public function getAllProjects(?string $categoryId = null);

    public function getprojectById(string $id);

    public function createproject(array $data);

    public function updateproject(array $data, string $id);

    public function deleteproject(string $id);
}
