<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescripcionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descripcion' => 'required|min:1|max:190',
        ];
    }
}
