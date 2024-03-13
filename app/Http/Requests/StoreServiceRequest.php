<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:services',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function prepareforValidation()
    {
        if (! isset($this->images)) {
            $this->merge([
                'images' => [],
            ]);
        }
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'Gambar Thumbnail',
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'slug' => 'Slug',
            'images' => 'Gambar Layanan',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'image' => ':attribute harus berupa gambar',
            'unique' => ':attribute sudah terdaftar',
        ];
    }
}
