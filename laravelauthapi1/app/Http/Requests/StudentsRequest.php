<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
            'firstname'=> ['required', 'string', 'max:255'],
            'lastname'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'date_of_birth'=> ['integer'],
            'gender'=> ['required', 'string', 'max:2'],
            'field_of_study'=> ['required', 'string', 'max:255'],
            'level_of_study'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'integer', 'max:50'],
            'email'=> ['required', 'string', 'max:255', 'unique:users'],
            'password'=> ['required', 'confirmed', Rules\password::defaults()]
        ];
    }
}
