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
        return view('app.services.index');
    }

    public function show($slug)
    {
        dd($slug);
    }
}
