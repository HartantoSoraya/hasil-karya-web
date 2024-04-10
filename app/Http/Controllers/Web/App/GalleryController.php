<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\GalleryRepositoryInterface;

class GalleryController extends Controller
{
    protected $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function index()
    {
        $galleries = $this->galleryRepository->getAllGallery();

        return view('pages.app.gallery', compact('galleries'));
    }
}
