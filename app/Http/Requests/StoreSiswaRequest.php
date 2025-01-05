<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
        //validate form
         return([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|min:2',
            'gender' => 'required|min:4',
            'phone' => 'required|numeric',
            'email' => 'required|min:10',	
            'address' => 'required|min:3'
        ]);
    }
}
