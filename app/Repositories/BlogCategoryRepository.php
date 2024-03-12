<?php

namespace App\Repositories;

use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function getAllBlogCategory()
    {
        return BlogCategory::all();
    }

    public function getBlogCategoryById(string $id)
    {
        return BlogCategory::findOrFail($id);
    }

    public function createBlogCategory(array $data)
    {
        DB::beginTransaction();

        try {
            $blogCategory = BlogCategory::create($data);

            DB::commit();

            return $blogCategory;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateBlogCategory(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $blogCategory = BlogCategory::findOrFail($id);

            $blogCategory->update($data);

            DB::commit();

            return $blogCategory;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteBlogCategory(string $id)
    {
        DB::beginTransaction();

        try {
            BlogCategory::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
