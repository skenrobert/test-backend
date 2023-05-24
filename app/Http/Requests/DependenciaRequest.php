<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenciaRequest extends FormRequest
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
                ];
            }
            case 'PUT':
            {

                return [
                    'codigo' => 'required|min:3|max:40',
                    'nombre' => 'required|min:3|max:40',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
