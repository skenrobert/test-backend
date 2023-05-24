<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoreRequest extends FormRequest
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
                    'paginaweb' => 'nullable|min:11|max:50',
                    'diascredito' => 'nullable|bail', 
                    'limitecredito' => 'nullable|bail', 
                    'observaciones' => 'nullable|bail|min:5|max:192', 
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
                    'paginaweb' => 'nullable|min:11|max:50',
                    'diascredito' => 'nullable|bail', 
                    'limitecredito' => 'nullable|bail', 
                    'observaciones' => 'nullable|bail|min:5|max:192', 
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
