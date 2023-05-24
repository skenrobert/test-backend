<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioRequest extends FormRequest
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
                    'numeroacciones' => 'nullable|bail', 
                    'estatus' => 'nullable|bail', 
                    'porcentajeparticipacion' => 'nullable|bail', 
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'tercero_id' => 'required',
                    'tiposocio_id' => 'nullable|bail', 
                ];
            }
            case 'PUT':
            {
                return [
                    'numeroacciones' => 'nullable|bail', 
                    'estatus' => 'nullable|bail', 
                    'porcentajeparticipacion' => 'nullable|bail', 
                    'tiposocio_id' => 'nullable|bail',  
                ];
            }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
