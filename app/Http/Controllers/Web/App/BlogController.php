<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepository;

    protected $blogCategoryRepository;

    protected $blogTagRepository;

    public function __construct(BlogRepositoryInterface $blogRepository, BlogCategoryRepositoryInterface $blogCategoryRepository, BlogTagRepositoryInterface $blogTagRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogCategoryRepository = $blogCategoryRepository;
        $this->blogTagRepository = $blogTagRepository;
    }

    public function index(Request $request)
    {
        $blogs = $this->blogRepository->getAllBlog(5);
        $categories = $this->blogCategoryRepository->getAllBlogCategory();
        $tags = $this->blogTagRepository->getAllBlogTag();

        return view('pages.app.blogs.index', compact('blogs', 'categories', 'tags'));
    }

    public function show(Request $request, $slug)
    {
        $blog = $this->blogRepository->getBlogBySlug($slug);
        $categories = $this->blogCategoryRepository->getAllBlogCategory();
        $tags = $this->blogTagRepository->getAllBlogTag();

        return view('pages.app.blogs.show', compact('blog', 'categories', 'tags'));
    }

    public function category(Request $request, $slug)
    {
        $blogs = $this->blogRepository->getBlogByCategorySlug($slug, 5);

        $categories = $this->blogCategoryRepository->getAllBlogCategory();

        $tags = $this->blogTagRepository->getAllBlogTag();

        return view('pages.app.blogs.index', compact('blogs', 'categories', 'tags'));
    }

    public function tag(Request $request, $slug)
    {
        $blogs = $this->blogRepository->getBlogByTagSlug($slug, 5);

        $categories = $this->blogCategoryRepository->getAllBlogCategory();

        $tags = $this->blogTagRepository->getAllBlogTag();

        return view('pages.app.blogs.index', compact('blogs', 'categories', 'tags'));
    }
}
