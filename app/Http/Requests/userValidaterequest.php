<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userValidaterequest extends FormRequest
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
        return [
            'name'=>'required|string|max:50|min:3',
            'email'=>'required|string|max:50',
            'password' =>'required|string|max:50|min:8',
            'role'=>'required|string'
        ];
    }
}
