<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentrocostoRequest extends FormRequest
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
                    'nombre' => 'required|min:3|max:40',
                    'direccion' => 'nullable|bail|min:5|max:192', 
                    'creador_id' => 'required',
                    'empresa_id' => 'required', 
                ];
            }
            case 'PUT':
            {

                return [
                    'nombre' => 'required|min:3|max:40',
                    'direccion' => 'nullable|bail|min:5|max:192', 
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
