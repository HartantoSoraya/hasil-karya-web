<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:services,slug,'.$this->route('service').',id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function prepareforValidation()
    {
        if (! isset($this->thumbnail)) {
            $this->merge([
                'thumbnail' => null,
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
        ];
    }
}
