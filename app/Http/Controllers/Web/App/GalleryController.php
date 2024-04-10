<?php

namespace App\Http\Controllers\Web\App;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;

class GalleryController extends Controller
{
    protected $projectRepository;
    protected $serviceRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository, ServiceRepositoryInterface $serviceRepository) 
    {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $projectImages = $this->projectRepository->getProjectImages();
        $serviceImages = $this->serviceRepository->getServiceImages();

        $images = $projectImages->merge($serviceImages);
        
        return view('pages.app.gallery');
    }
}
