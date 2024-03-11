<?php

namespace App\Interfaces;

interface BlogTagRepositoryInterface
{
    public function getAllBlogTag();

    public function getBlogTagById(string $id);

    public function createBlogTag(array $data);

    public function updateBlogTag(array $data, string $id);

    public function deleteBlogTag(string $id);
}
