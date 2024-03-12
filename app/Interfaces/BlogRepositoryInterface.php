<?php

namespace App\Interfaces;

interface BlogRepositoryInterface
{
    public function getAllBlog();

    public function getBlogById(string $id);

    public function createBlog(array $data);

    public function updateBlog(array $data, string $id);

    public function deleteBlog(string $id);
}
