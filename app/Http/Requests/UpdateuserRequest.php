<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateuserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required",
            'username' => "required|unique:users,username,".$this->id,
            'password' => "string",
            'address' => "required",
            'dob' => "required",
            'phone' => "required",
            'degree' => "required",
            'department' => "required",
            'position' => "required",
        ];
    }
}
