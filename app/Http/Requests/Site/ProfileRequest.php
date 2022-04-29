<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }
}
