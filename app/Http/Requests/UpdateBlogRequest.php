<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'slug' => 'required|string|max:255|unique:blogs,slug,'.$this->route('blog').',id',
            'categories' => 'nullable|array',
            'categories.*' => 'required|exists:blog_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'required|exists:blog_tags,id',
        ];
    }

    public function prepareforValidation()
    {
        if (! isset($this->thumbnail)) {
            $this->merge([
                'thumbnail' => null,
            ]);
        }

        if (! isset($this->categories)) {
            $this->merge([
                'categories' => [],
            ]);
        }

        if (! isset($this->tags)) {
            $this->merge([
                'tags' => [],
            ]);
        }
    }

    public function attributes()
    {
        return [
            'title' => 'Judul',
            'thumbnail' => 'Gambar Thumbnail',
            'content' => 'Konten',
            'slug' => 'Slug',
            'categories' => 'Kategori',
            'tags' => 'Tagar',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'unique' => ':attribute sudah ada',
            'image' => ':attribute harus berupa gambar',
        ];
    }
}
