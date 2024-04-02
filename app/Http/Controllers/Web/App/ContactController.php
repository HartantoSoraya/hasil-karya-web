<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerServiceRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $customerServiceRepository;

    public function __construct(CustomerServiceRepositoryInterface $customerServiceRepository)
    {
        $this->customerServiceRepository = $customerServiceRepository;
    }

    public function index()
    {
        $customerServices = $this->customerServiceRepository->getAllCustomerServices();

        return view('pages.app.contact', compact('customerServices'));
    }
}
