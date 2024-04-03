<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->getAllService();

        return view('pages.app.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = $this->serviceRepository->getServiceBySlug($slug);

        return view('pages.app.services.show', compact('service'));
    }
}
