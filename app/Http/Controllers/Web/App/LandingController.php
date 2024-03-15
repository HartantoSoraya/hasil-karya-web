<?php

namespace App\Http\Controllers\Web\App;

use PHPUnit\Event\Code\Test;
use App\Http\Controllers\Controller;
use App\Interfaces\BannerRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Interfaces\TestimonialRepositoryInterface;
use App\Interfaces\ProjectCategoryRepositoryInterface;

class LandingController extends Controller
{
    protected $bannerRepository;
    protected $serviceRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;
    protected $testimonialRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository,
        ServiceRepositoryInterface $serviceRepository,
        ProjectCategoryRepositoryInterface $projectCategoryRepository,
        ProjectRepositoryInterface $projectRepository,
        TestimonialRepositoryInterface $testimonialRepository        

    ) {
        $this->bannerRepository = $bannerRepository;
        $this->serviceRepository = $serviceRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->projectRepository = $projectRepository;
        $this->testimonialRepository = $testimonialRepository;
    }

    public function index()
    {
        $banners = $this->bannerRepository->getAllBanner();
        $services = $this->serviceRepository->getAllService();
        $projectCategories = $this->projectCategoryRepository->getAllProjectCategory();
        $projects = $this->projectRepository->getAllProjects();
        $testimonials = $this->testimonialRepository->getAllTestimonial();        

        return view('pages.app.landing', compact(
            'banners', 
            'services', 
            'projectCategories', 
            'projects',
            'testimonials'
        ));
    }
}
