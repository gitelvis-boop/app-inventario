<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ruc' => 'required',
            'razonSocial' => 'required',
            'nombreComercial' => 'required'
        ];
    }
}
