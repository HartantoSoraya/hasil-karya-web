<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'Gambar',
            'name' => 'Nama',
            'title' => 'Judul',
            'subtitle' => 'Sub Judul',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format: :values',
            'max' => ':attribute maksimal :max KB',
        ];
    }
}
