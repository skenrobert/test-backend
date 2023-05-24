<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisioneRequest extends FormRequest
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
                    'codigo' => 'required|min:3|max:40',
                    'nombre' => 'required|min:3|max:40',
                    'creador_id' => 'required',
                    'puc_id' => 'required|bail', 
                ];
            }
            case 'PUT':
            {

                return [
                    'codigo' => 'required|min:3|max:40',
                    'nombre' => 'required|min:3|max:40',
                    'puc_id' => 'required|bail', 
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
