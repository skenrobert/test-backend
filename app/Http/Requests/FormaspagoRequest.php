<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormaspagoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'codigo' => 'min:2|max:10|required',
                    'descripcion' => 'min:4|max:100|required',
                    'cantidadcuotas' => 'min:1|max:2|nullable',
                    'diasplazo' => 'min:1|max:2|nullable',
                    'metodospago_id' => 'bail|nullable',
                    'tipoformaspago_id' => 'required',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'codigo' => 'min:2|max:10|required',
                    'descripcion' => 'min:4|max:100|required',
                    'cantidadcuotas' => 'min:1|max:2|nullable',
                    'diasplazo' => 'min:1|max:2|nullable',
                    'metodospago_id' => 'bail|nullable',
                    'tipoformaspago_id' => 'required',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}

