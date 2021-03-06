<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'from' => 'required',
            'to' => 'required',
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date',
            'kilo' => 'required',
            'price' => 'required',
            'company' => 'required',
            'payment' => 'required',
        ];
    }
}
