<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'=>'required|unique:user,email',
            'name'=>'required|min:2|string',
            'age'=>'integer|between:1,150',
            'sex'=>Rule::in(['m','w']),
            'birthday'=>'date',
            'phone'=>'required|min:5|string|unique:user,phone',  
        ];
    }
}
