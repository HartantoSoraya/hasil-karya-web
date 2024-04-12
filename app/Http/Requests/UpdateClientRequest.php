<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:clients,name,'.$this->route('client').',id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|url',
        ];
    }

    public function prepareForValidation()
    {
        if (! isset($this->logo)) {
            $this->merge([
                'logo' => null,
            ]);
        }
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'logo' => 'Logo',
            'url' => 'URL',
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
            'mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
            'url' => ':attribute harus berupa URL',
        ];
    }
}
