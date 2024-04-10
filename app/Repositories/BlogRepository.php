<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAllBlog($perPage = null)
    {
        if ($perPage) {
            return Blog::with('categories', 'tags')->paginate($perPage);
        }

        return Blog::with('categories', 'tags')->get();
    }

    public function getBlogById(string $id)
    {
        return Blog::with('categories', 'tags')->findOrFail($id);
    }

    public function getBlogBySlug(string $slug)
    {
        return Blog::with('categories', 'tags')->where('slug', $slug)->first();
    }

    public function getBlogByCategorySlug(string $slug, $perPage = null)
    {
        if ($perPage) {
            return Blog::with('categories', 'tags')->whereHas('categories', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->paginate($perPage);
        }

        return Blog::with('categories', 'tags')->whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBlogByTagSlug(string $slug, $perPage = null)
    {
        if ($perPage) {
            return Blog::with('categories', 'tags')->whereHas('tags', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->paginate($perPage);
        }

        return Blog::with('categories', 'tags')->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
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

            $blog->categories()->attach($data['categories']);
            $blog->tags()->attach($data['tags']);

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

            $blog->categories()->sync($data['categories']);
            $blog->tags()->sync($data['tags']);

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
