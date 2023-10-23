<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id'=>'required|integer|exists:user,id',
            'email'=>'nullable|unique:user,email',
            'name'=>'nullable|min:2|string',
            'age'=>'nullable|integer|between:1,150',
            'sex'=>['nullable', Rule::in(["m","w"])],
            'birthday'=>'nullable|date',
            'phone'=>'nullable|min:5|string|unique:user,phone',  
        ];
    }
}
