<?php

namespace App\Repositories;

use App\Interfaces\GalleryRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;

class GalleryRepository implements GalleryRepositoryInterface
{
    protected $projectRepository;

    protected $serviceRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository, ServiceRepositoryInterface $serviceRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function getAllGallery($limit = null)
    {
        $projectImages = $this->projectRepository->getProjectImages();
        $serviceImages = $this->serviceRepository->getServiceImages();

        $galleries = $projectImages->merge($serviceImages);

        if ($limit) {
            $galleries = $galleries->take($limit);
        }

        $galleries = $galleries->sortByDesc('created_at');

        return $galleries;
    }
}
