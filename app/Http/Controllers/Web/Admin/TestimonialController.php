<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Interfaces\TestimonialRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;
class TestimonialController extends Controller
{
    protected $testimonialRepository;

    public function __construct(TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    public function index(Request $request)
    {
        $testimonials = $this->testimonialRepository->getAllTestimonial();
        
        return view('pages.admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('pages.admin.testimonial.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();
        $this->testimonialRepository->createTestimonial($data);
        Swal::toast('Testimonial created successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.testimonial.index');
    }

    public function show($id)
    {
        $testimonial = $this->testimonialRepository->getTestimonialById($id);
        
        return view('pages.admin.testimonial.show', compact('testimonial'));
    }

    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->getTestimonialById($id);
        
        return view('pages.admin.testimonial.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, $id)
    {
        $data = $request->validated();
        $this->testimonialRepository->updateTestimonial($data, $id);
        Swal::toast('Testimonial updated successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.testimonial.index');
    }

    public function destroy($id)
    {
        $this->testimonialRepository->deleteTestimonial($id);
        Swal::toast('Testimonial deleted successfully!', 'success')->timerProgressBar();
        
        return redirect()->route('admin.testimonial.index');
    }
}