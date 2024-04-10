<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerServiceRequest;
use App\Http\Requests\UpdateCustomerServiceRequest;
use App\Interfaces\CustomerServiceRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class CustomerServiceController extends Controller
{
    protected $customerServiceRepository;

    public function __construct(CustomerServiceRepositoryInterface $customerServiceRepository)
    {
        $this->customerServiceRepository = $customerServiceRepository;
    }

    public function index(Request $request)
    {
        $customerServices = $this->customerServiceRepository->getAllcustomerServices();

        return view('pages.admin.customer-service.index', compact('customerServices'));
    }

    public function create()
    {
        return view('pages.admin.customer-service.create');
    }

    public function store(StoreCustomerServiceRequest $request)
    {
        $data = $request->validated();
        $this->customerServiceRepository->createCustomerService($data);
        Swal::toast('Customer service created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.customer-service.index');
    }

    public function show($id)
    {
        $customerService = $this->customerServiceRepository->getCustomerServiceById($id);

        return view('pages.admin.customer-service.show', compact('customerService'));
    }

    public function edit($id)
    {
        $customerService = $this->customerServiceRepository->getCustomerServiceById($id);

        return view('pages.admin.customer-service.edit', compact('customerService'));
    }

    public function update(UpdateCustomerServiceRequest $request, $id)
    {
        $data = $request->validated();
        $this->customerServiceRepository->updateCustomerService($data, $id);
        Swal::toast('Customer service updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.customer-service.index');
    }

    public function destroy($id)
    {
        $this->customerServiceRepository->deleteCustomerService($id);
        Swal::toast('Customer service deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.customer-service.index');
    }
}
