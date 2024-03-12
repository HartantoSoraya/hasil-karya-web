<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ProjectCategoryController extends Controller
{
    protected $projectCategoryRepository;

    public function __construct(ProjectCategoryRepositoryInterface $projectCategoryRepository)
    {
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function index(Request $request)
    {
        $projectCategories = $this->projectCategoryRepository->getAllProjectCategory();

        return view('pages.admin.project-category.index', compact('projectCategories'));
    }

    public function create()
    {
        return view('pages.admin.project-category.create');
    }

    public function store(StoreProjectCategoryRequest $request)
    {
        $data = $request->validated();
        $this->projectCategoryRepository->createProjectCategory($data);
        Swal::toast('Project category created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project-category.index');
    }

    public function show($id)
    {
        $projectCategory = $this->projectCategoryRepository->getProjectCategoryById($id);

        return view('pages.admin.project-category.show', compact('projectCategory'));
    }

    public function edit($id)
    {
        $projectCategory = $this->projectCategoryRepository->getProjectCategoryById($id);

        return view('pages.admin.project-category.edit', compact('projectCategory'));
    }

    public function update(UpdateProjectCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $this->projectCategoryRepository->updateProjectCategory($data, $id);
        Swal::toast('Project category updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project-category.index');
    }

    public function destroy($id)
    {
        $this->projectCategoryRepository->deleteProjectCategory($id);
        Swal::toast('Project category deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project-category.index');
    }
}
