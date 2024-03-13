<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectCategoryRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        $projects = $this->projectRepository->getAllprojects();

        return view('pages.admin.project.index', compact('projects'));
    }

    public function create()
    {
        $projectCategoryRepository = new ProjectCategoryRepository();
        $categories = $projectCategoryRepository->getAllProjectCategory();

        return view('pages.admin.project.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $this->projectRepository->createProject($data);
        Swal::toast('Project created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project.index');
    }

    public function show($id)
    {
        $project = $this->projectRepository->getProjectById($id);

        return view('pages.admin.project.show', compact('project'));
    }

    public function edit($id)
    {
        $projectCategoryRepository = new ProjectCategoryRepository();
        $categories = $projectCategoryRepository->getAllProjectCategory();

        $project = $this->projectRepository->getProjectById($id);

        return view('pages.admin.project.edit', compact('categories', 'project'));
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $data = $request->validated();
        $this->projectRepository->updateProject($data, $id);
        Swal::toast('Project updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project.index');
    }

    public function destroy($id)
    {
        $this->projectRepository->deleteProject($id);
        Swal::toast('Project deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.project.index');
    }
}
