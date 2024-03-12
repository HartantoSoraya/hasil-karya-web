<?php

namespace App\Interfaces;

interface ProjectCategoryRepositoryInterface
{
    public function getAllProjectCategory();

    public function getProjectCategoryById(string $id);

    public function createProjectCategory(array $data);

    public function updateProjectCategory(array $data, string $id);

    public function deleteProjectCategory(string $id);
}
