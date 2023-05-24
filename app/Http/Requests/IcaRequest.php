<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IcaRequest extends FormRequest
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
                    'tarifa' => 'required|bail|max:1',
                    'actividad' => 'required|bail|max:1',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            case 'PUT':
            {

                return [
                    'tarifa' => 'required|bail|min:1|max:40',
                    'actividad' => 'required|bail|min:3|max:40',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
