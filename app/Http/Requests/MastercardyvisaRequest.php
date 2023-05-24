<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MastercardyvisaRequest extends FormRequest
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
                    'codigo' => 'nullable|min:1|max:6',
                    'descripcion' => 'nullable|bail|min:5|max:192', 
                    'estatus' => 'nullable|bail', 
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'tercero_id' => 'required',
                    'terminopago_id' => 'nullable|bail', 
                ];
            }
            case 'PUT':
            {
                return [
                    'codigo' => 'nullable|min:1|max:6',
                    'descripcion' => 'nullable|bail|min:5|max:192', 
                    'estatus' => 'nullable|bail', 
                    'terminopago_id' => 'nullable|bail', 
                ];
            }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
