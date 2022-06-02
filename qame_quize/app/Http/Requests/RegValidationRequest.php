<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegValidationRequest extends FormRequest
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
            'fname' => 'required|min:3|max:50',
            'lname' => 'required|min:3|max:50',
            'password' => 'required|min:8|max:50',
            'email' => 'required|email:rfc,dns',//:rfc,dns
            'date' => 'required|before:today',
        ];

        
    }
    public function attributes()
    {
        return 
        [
            'fname'=>'first name',
            'lname' => 'last name'

        ];
    }
}
