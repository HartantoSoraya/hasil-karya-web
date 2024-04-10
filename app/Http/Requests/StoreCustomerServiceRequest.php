<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerServiceRequest extends FormRequest
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
            'email' => 'required|email',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Judul',
            'email' => 'Email',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'email' => ':attribute harus berupa email',
        ];
    }
}
