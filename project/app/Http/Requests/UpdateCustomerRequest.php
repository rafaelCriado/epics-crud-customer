<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'cpf' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'birthday' => 'required',
            'street' => 'required',
            'district' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required'
        ];
    }
}
