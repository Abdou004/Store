<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'email'=>'unique:profiles|required|email',
            'password'=>'required|min:9|max:50|confirmed',
            'bio'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg|max:10240'
        ];
    }
}
