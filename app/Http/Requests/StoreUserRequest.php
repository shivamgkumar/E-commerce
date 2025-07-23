<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    'name' => 'required|max:100|min:3|string',
    'price' => 'required|numeric|min:1|max:999999.99',
    'category_id' => 'nullable|numeric|exists:categories,id',
    'product_img' => 'required_if:formType,add|image|mimes:jpeg,png,jpg|max:2048',
    'description' => 'required|min:8|string',
    'features' => 'required|min:8|string'
   ];

}
}   
