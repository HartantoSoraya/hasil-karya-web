<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogTagRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(Request $request)
    {
        $blogs = $this->blogRepository->getAllBlog();

        return view('pages.admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $blogCategoryRepository = new BlogCategoryRepository();
        $categories = $blogCategoryRepository->getAllBlogCategory();

        $blogTagRepository = new BlogTagRepository();
        $tags = $blogTagRepository->getAllBlogTag();

        return view('pages.admin.blog.create', compact('categories', 'tags'));
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $this->blogRepository->createBlog($data);
        Swal::toast('Blog created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog.index');
    }

    public function show($id)
    {
        $blog = $this->blogRepository->getBlogById($id);

        return view('pages.admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blogCategoryRepository = new BlogCategoryRepository();
        $categories = $blogCategoryRepository->getAllBlogCategory();

        $blogTagRepository = new BlogTagRepository();
        $tags = $blogTagRepository->getAllBlogTag();

        $blog = $this->blogRepository->getBlogById($id);

        return view('pages.admin.blog.edit', compact('categories', 'tags', 'blog'));
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        $data = $request->validated();
        $this->blogRepository->updateBlog($data, $id);
        Swal::toast('Blog updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        $this->blogRepository->deleteBlog($id);
        Swal::toast('Blog deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog.index');
    }
}
