<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWebConfigurationRequest;
use App\Interfaces\WebConfigurationRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class WebConfigurationController extends Controller
{
    protected $webConfigurationRepository;

    public function __construct(WebConfigurationRepositoryInterface $webConfigurationRepository)
    {
        $this->webConfigurationRepository = $webConfigurationRepository;
    }

    public function show($id)
    {
        $webConfiguration = $this->webConfigurationRepository->getWebConfigurationById($id);

        return view('pages.admin.web-configuration.show', compact('webConfiguration'));
    }

    public function update(UpdateWebConfigurationRequest $request, $id)
    {
        $data = $request->validated();
        $this->webConfigurationRepository->updateWebConfiguration($data, $id);
        Swal::toast('Web configuration updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.web-configuration.index');
    }
}
