<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Interfaces\ServiceRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;
class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(Request $request)
    {
        $services = $this->serviceRepository->getAllService();
        
        return view('pages.admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('pages.admin.service.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $this->serviceRepository->createService($data);
        Swal::toast('Service created successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.service.index');
    }

    public function show($id)
    {
        $service = $this->serviceRepository->getServiceById($id);
        
        return view('pages.admin.service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = $this->serviceRepository->getServiceById($id);
        
        return view('pages.admin.service.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        $data = $request->validated();
        $this->serviceRepository->updateService($data, $id);
        Swal::toast('Service updated successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.service.index');
    }

    public function destroy($id)
    {
        $this->serviceRepository->deleteService($id);
        Swal::toast('Service deleted successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.service.index');
    }
}