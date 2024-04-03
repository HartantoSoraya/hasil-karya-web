<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectRepository;
    protected $projectCategoryRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectCategoryRepositoryInterface $projectCategoryRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->getAllProjects();
        $projectCategories = $this->projectCategoryRepository->getAllProjectCategory();

        return view('pages.app.projects.index', compact('projects', 'projectCategories'));
    }

    public function show($slug)
    {
        $project = $this->projectRepository->getProjectBySlug($slug);

        return view('pages.app.projects.show', compact('project'));
    }
}
