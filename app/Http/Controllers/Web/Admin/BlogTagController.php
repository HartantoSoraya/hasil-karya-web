<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogTagRequest;
use App\Http\Requests\UpdateBlogTagRequest;
use App\Interfaces\BlogTagRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class BlogTagController extends Controller
{
    protected $blogTagRepository;

    public function __construct(BlogTagRepositoryInterface $blogTagRepository)
    {
        $this->blogTagRepository = $blogTagRepository;
    }

    public function index(Request $request)
    {
        $blogTags = $this->blogTagRepository->getAllBlogTag();

        return view('pages.admin.blog-tag.index', compact('blogTags'));
    }

    public function create()
    {
        return view('pages.admin.blog-tag.create');
    }

    public function store(StoreBlogTagRequest $request)
    {
        $data = $request->validated();
        $this->blogTagRepository->createBlogTag($data);
        Swal::toast('Blog tag created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-tag.index');
    }

    public function show($id)
    {
        $blogTag = $this->blogTagRepository->getBlogTagById($id);

        return view('pages.admin.blog-tag.show', compact('blogTag'));
    }

    public function edit($id)
    {
        $blogTag = $this->blogTagRepository->getBlogTagById($id);

        return view('pages.admin.blog-tag.edit', compact('blogTag'));
    }

    public function update(UpdateBlogTagRequest $request, $id)
    {
        $data = $request->validated();
        $this->blogTagRepository->updateBlogTag($data, $id);
        Swal::toast('Blog tag updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-tag.index');
    }

    public function destroy($id)
    {
        $this->blogTagRepository->deleteBlogTag($id);
        Swal::toast('Blog tag deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.blog-tag.index');
    }
}
