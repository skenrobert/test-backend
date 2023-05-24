<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadesmedidaRequest extends FormRequest
{
   
    public function authorize()
    {
        return True;
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
                    'codigo' => 'min:3|max:40|required', 
                    'descripcion' => 'min:3|max:40|required', 
                    'unidadpeso' => 'bail', 
                    'factorgramos' => 'bail', 
                    'codigodian' => 'nullable|bail', 
                    'creador_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'codigo' => 'min:3|max:40|required', 
                    'descripcion' => 'min:3|max:40|required', 
                    'unidadpeso' => 'bail', 
                    'factorgramos' => 'bail', 
                    'codigodian' => 'nullable|bail', 
                ];
            }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
