<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Interfaces\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class BlogCategoryController extends Controller
{
    protected $blogCategoryRepository;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function index(Request $request)
    {
        $blogCategories = $this->blogCategoryRepository->getAllBlogCategory();

        return view('pages.admin.blog-category.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('pages.admin.blog-category.create');
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $data = $request->validated();
        $this->blogCategoryRepository->createBlogCategory($data);
        Swal::toast('Blog category created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-category.index');
    }

    public function show($id)
    {
        $blogCategory = $this->blogCategoryRepository->getBlogCategoryById($id);

        return view('pages.admin.blog-category.show', compact('blogCategory'));
    }

    public function edit($id)
    {
        $blogCategory = $this->blogCategoryRepository->getBlogCategoryById($id);

        return view('pages.admin.blog-category.edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $this->blogCategoryRepository->updateBlogCategory($data, $id);
        Swal::toast('Blog category updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-category.index');
    }

    public function destroy($id)
    {
        $this->blogCategoryRepository->deleteBlogCategory($id);
        Swal::toast('Blog category deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-category.index');
    }
}
