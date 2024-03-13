<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,'.$this->route('project').',id',
            'description' => 'required|string',
            'client' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'categories' => 'nullable|array',
            'categories.*' => 'required|exists:project_categories,id',
            'images' => 'nullable|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ];
    }

    public function prepareForValidation()
    {
        if (! isset($this->categories)) {
            $this->merge(['categories' => []]);
        }
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'Gambar Thumbnail',
            'name' => 'Nama',
            'slug' => 'Slug',
            'description' => 'Deskripsi',
            'client' => 'Klien',
            'start_date' => 'Tanggal Mulai',
            'end_date' => 'Tanggal Selesai',
            'categories' => 'Kategori',
            'images' => 'Gambar',
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
            'mimes' => ':attribute harus berupa file berformat :values',
            'date' => ':attribute harus berupa tanggal',
            'after' => ':attribute harus tanggal setelah :date',
            'unique' => ':attribute sudah terdaftar',
            'exists' => ':attribute tidak valid',
        ];
    }
}
