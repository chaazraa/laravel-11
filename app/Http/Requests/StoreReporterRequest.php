<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReporterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ([
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:255',
            'age'       => 'required|numeric',
            'address'   => 'required|string|max:255',
        ]); 
    }
}
