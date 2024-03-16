<?php

namespace App\Repositories;

use App\Interfaces\TestimonialRepositoryInterface;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function getAllTestimonial()
    {
        return Testimonial::all();
    }

    public function getTestimonialById(string $id)
    {
        return Testimonial::findOrFail($id);
    }

    public function createTestimonial(array $data)
    {
        DB::beginTransaction();

        try {
            $testimonial = new Testimonial;
            $testimonial->name = $data['name'];
            $testimonial->title = $data['title'];
            $testimonial->subtitle = $data['subtitle'];
            $testimonial->save();

            DB::commit();

            return $testimonial;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateTestimonial(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->name = $data['name'];
            $testimonial->title = $data['title'];
            $testimonial->subtitle = $data['subtitle'];
            $testimonial->save();

            DB::commit();

            return $testimonial;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteTestimonial(string $id)
    {
        DB::beginTransaction();

        try {
            Testimonial::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
