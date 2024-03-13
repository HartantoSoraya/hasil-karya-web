<?php

namespace App\Interfaces;

interface projectRepositoryInterface
{
    public function getAllProjects();

    public function getprojectById(string $id);

    public function createproject(array $data);

    public function updateproject(array $data, string $id);

    public function deleteproject(string $id);
}
