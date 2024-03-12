<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAllBlog()
    {
        return Blog::all();
    }

    public function getBlogById(string $id)
    {
        return Blog::findOrFail($id);
    }

    public function createBlog(array $data)
    {
        DB::beginTransaction();

        try {
            $blog = new Blog();
            $blog->title = $data['title'];
            $blog->thumbnail = $data['thumbnail']->store('assets/blog/thumbnails', 'public');
            $blog->content = $data['content'];
            $blog->slug = $data['slug'];
            $blog->save();

            DB::commit();

            return $blog;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateBlog(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $blog = Blog::findOrFail($id);

            $blog->title = $data['title'];
            if ($data['thumbnail']) {
                $blog->thumbnail = $this->updateImage($blog->thumbnail, $data['thumbnail']);
            }
            $blog->content = $data['content'];
            $blog->slug = $data['slug'];
            $blog->save();

            DB::commit();

            return $blog;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteBlog(string $id)
    {
        DB::beginTransaction();

        try {
            Blog::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    private function updateImage(string $oldImage, $newImage)
    {
        if ($oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return $newImage->store('assets/blog/thumbnails', 'public');
    }
}
