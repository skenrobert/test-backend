<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetodospagoRequest extends FormRequest
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
                    'tipometodospago_id' => 'required',
                    'cuentabancaria_id' => 'bail|nullable',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'codigo' => 'min:2|max:10|required',
                    'descripcion' => 'min:4|max:100|required',
                    'tipometodospago_id' => 'required',
                    'cuentabancaria_id' => 'bail|nullable',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
