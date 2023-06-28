<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatereaderRequest extends FormRequest
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
            'gender' => "required",
            'age' => "required|after_or_equal:18|before_or_equal:55",
            'phone' => "required",
            'email' => "required|email",
            'address' => "string|required",
            'type_id' => "required",
            'user_id' => "required",
            'register_date' => "required",
            'expired_date' => "required"
        ];
    }
}
