<?php

namespace App\Repositories;

use App\Interfaces\TestimonialRepositoryInterface;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

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
            $testimonial = Testimonial::create($data);

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

            $testimonial->update($data);

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
