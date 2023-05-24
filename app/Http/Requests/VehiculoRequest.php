<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
                  'placa' => 'required|min:4|max:20',
                  'cilindraje' => 'required|min:4|max:20',
                  'modelo' => 'required|min:4|max:20',
                  'color' => 'required|min:4|max:20',
                  'num_motor' => 'required|min:7|max:20',
                  'num_chasis' => 'required|min:7|max:20',
                  'linea' => 'required|min:3|max:20',
                  'soat' => 'date|nullable',
                  'tecno' => 'date|nullable',
                  'tipovehiculo_id' => 'required',
                  'marcavehiculo_id' => 'required',
                  'empresa_id' => 'required',
                ];
            }
            case 'PUT':
                {
                    return [
                      'placa' => 'required|min:4|max:20',
                      'cilindraje' => 'required|min:4|max:20',
                      'modelo' => 'required|min:4|max:20',
                      'color' => 'required|min:4|max:20',
                      'num_motor' => 'required|min:7|max:20',
                      'num_chasis' => 'required|min:7|max:20',
                      'linea' => 'required|min:3|max:20',
                      'soat' => 'date|nullable',
                      'tecno' => 'date|nullable',
                      'tipovehiculo_id' => 'required',
                      'marcavehiculo_id' => 'required',
                      'empresa_id' => 'required',
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
