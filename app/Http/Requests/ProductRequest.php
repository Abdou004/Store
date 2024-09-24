<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules =[
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'quantity' => 'required| numeric',
            'price' => 'required| numeric',
            'category_id' => 'required|numeric',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // 'put' or 'patch' indicates an update request
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
        }

        return $rules;
    }
}
