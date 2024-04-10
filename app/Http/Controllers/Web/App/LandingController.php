<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\BannerRepositoryInterface;
use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\FrequentlyAskedQuestionRepositoryInterface;
use App\Interfaces\GalleryRepositoryInterface;
use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Interfaces\TestimonialRepositoryInterface;

class LandingController extends Controller
{
    protected $bannerRepository;

    protected $serviceRepository;

    protected $projectCategoryRepository;

    protected $projectRepository;

    protected $galleryRepository;

    protected $frequentlyAskedQuestionRepository;

    protected $testimonialRepository;

    protected $blogRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository,
        ServiceRepositoryInterface $serviceRepository,
        ProjectCategoryRepositoryInterface $projectCategoryRepository,
        ProjectRepositoryInterface $projectRepository,
        GalleryRepositoryInterface $galleryRepository,
        FrequentlyAskedQuestionRepositoryInterface $frequentlyAskedQuestionRepository,
        TestimonialRepositoryInterface $testimonialRepository,
        BlogRepositoryInterface $blogRepository
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->serviceRepository = $serviceRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->projectRepository = $projectRepository;
        $this->galleryRepository = $galleryRepository;
        $this->frequentlyAskedQuestionRepository = $frequentlyAskedQuestionRepository;
        $this->testimonialRepository = $testimonialRepository;
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $banners = $this->bannerRepository->getAllBanner();
        $services = $this->serviceRepository->getAllService();
        $projectCategories = $this->projectCategoryRepository->getAllProjectCategory();
        $projects = $this->projectRepository->getAllProjects();
        $galleries = $this->galleryRepository->getAllGallery(3);
        $faqs = $this->frequentlyAskedQuestionRepository->getAllFrequentlyAskedQuestion();
        $testimonials = $this->testimonialRepository->getAllTestimonial();
        $blogs = $this->blogRepository->getAllBlog()->take(3);

        return view('pages.app.landing', compact(
            'banners',
            'services',
            'projectCategories',
            'projects',
            'galleries',
            'faqs',
            'testimonials',
            'blogs'
        ));
    }
}
