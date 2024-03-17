<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(Request $request)
    {
        $clients = $this->clientRepository->getAllclients();

        return view('pages.admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('pages.admin.client.create');
    }

    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        $this->clientRepository->createClient($data);
        Swal::toast('Client created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.client.index');
    }

    public function show($id)
    {
        $client = $this->clientRepository->getClientById($id);

        return view('pages.admin.client.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->clientRepository->getClientById($id);

        return view('pages.admin.client.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $data = $request->validated();
        $this->clientRepository->updateClient($data, $id);
        Swal::toast('Client updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.client.index');
    }

    public function destroy($id)
    {
        $this->clientRepository->deleteClient($id);
        Swal::toast('Client deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.client.index');
    }
}
