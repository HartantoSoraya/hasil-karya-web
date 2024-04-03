<?php

namespace App\Interfaces;

interface BlogRepositoryInterface
{
    public function getAllBlog($perPage = null);

    public function getBlogById(string $id);

    public function getBlogBySlug(string $slug);

    public function getBlogByCategorySlug(string $slug, $perPage = null);

    public function getBlogByTagSlug(string $slug, $perPage = null);

    public function createBlog(array $data);

    public function updateBlog(array $data, string $id);

    public function deleteBlog(string $id);
}
