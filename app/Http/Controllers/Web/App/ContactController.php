<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerServiceRepositoryInterface;
use App\Models\Contact;
use App\Models\CustomerService;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

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

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'company_name' => 'required|string',
            'message' => 'required|string',
            'customer_service_id' => 'required|uuid|exists:customer_services,id',
        ]);

        $contactData = $request->only(['full_name', 'email', 'phone_number', 'company_name', 'message', 'customer_service_id']);

        Contact::create($contactData);

        $customerService = CustomerService::find($request->customer_service_id);

        if ($customerService) {
            $customerServiceTitle = $customerService->title;

            $contactNotificationData = [
                'customer_service_title' => $customerServiceTitle,
                'full_name' => $contactData['full_name'],
                'email' => $contactData['email'],
                'phone_number' => $contactData['phone_number'],
                'company_name' => $contactData['company_name'],
                'message' => $contactData['message'],
            ];

            $customerService->notify(new ContactNotification($contactNotificationData));
        }

        return redirect()->route('app.contact')->with('success', 'Pesan berhasil dikirim');
    }

}
