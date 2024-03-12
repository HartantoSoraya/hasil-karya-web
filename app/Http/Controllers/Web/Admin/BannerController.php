<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Interfaces\BannerRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class BannerController extends Controller
{
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function index(Request $request)
    {
        $banners = $this->bannerRepository->getAllBanner();

        return view('pages.admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('pages.admin.banner.create');
    }

    public function store(StoreBannerRequest $request)
    {
        $data = $request->validated();
        $this->bannerRepository->createBanner($data);
        Swal::toast('Banner created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.banner.index');
    }

    public function show($id)
    {
        $banner = $this->bannerRepository->getBannerById($id);

        return view('pages.admin.banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = $this->bannerRepository->getBannerById($id);

        return view('pages.admin.banner.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, $id)
    {
        $data = $request->validated();
        $this->bannerRepository->updateBanner($data, $id);
        Swal::toast('Banner updated successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.banner.index');
    }

    public function destroy($id)
    {
        $this->bannerRepository->deleteBanner($id);
        Swal::toast('Banner deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.banner.index');
    }
}
