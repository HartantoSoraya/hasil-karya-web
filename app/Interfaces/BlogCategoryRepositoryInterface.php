<?php

namespace App\Interfaces;

interface BlogCategoryRepositoryInterface
{
    public function getAllBlogCategory();

    public function getBlogCategoryById(string $id);

    public function createBlogCategory(array $data);

    public function updateBlogCategory(array $data, string $id);

    public function deleteBlogCategory(string $id);
}
