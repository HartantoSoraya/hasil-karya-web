<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(Request $request)
    {
        $contacts = $this->contactRepository->getAllContact();

        return view('pages.admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('pages.admin.contact.create');
    }

    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $this->contactRepository->createContact($data);
        Swal::toast('Contact created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.contact.index');
    }

    public function show($id)
    {
        $contact = $this->contactRepository->getContactById($id);

        return view('pages.admin.contact.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = $this->contactRepository->getContactById($id);

        return view('pages.admin.contact.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, $id)
    {
        $data = $request->validated();
        $this->contactRepository->updateContact($data, $id);
        Swal::toast('Contact updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.contact.index');
    }

    public function destroy($id)
    {
        $this->contactRepository->deleteContact($id);
        Swal::toast('Contact deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.contact.index');
    }
}
