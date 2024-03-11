<?php

namespace App\Repositories;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Models\BlogTag;
use Illuminate\Support\Facades\DB;

class BlogTagRepository implements BlogTagRepositoryInterface
{
    public function getAllBlogTag()
    {
        return BlogTag::all();
    }

    public function getBlogTagById(string $id)
    {
        return BlogTag::findOrFail($id);
    }

    public function createBlogTag(array $data)
    {
        DB::beginTransaction();
        try {
            $blogTag = BlogTag::create($data);
            DB::commit();

            return $blogTag;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateBlogTag(array $data, string $id)
    {
        DB::beginTransaction();
        try {
            $blogtags = BlogTag::findOrFail($id);
            $blogtags->update($data);
            DB::commit();

            return $blogtags;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteBlogTag(string $id)
    {
        DB::beginTransaction();
        try {
            BlogTag::findOrFail($id)->delete();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
