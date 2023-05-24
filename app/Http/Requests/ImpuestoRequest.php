<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImpuestoRequest extends FormRequest
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
                    'creador_id' => 'required',
                    'articulo_id' => 'bail|nullable|required_without:servicio_id',
                    'servicio_id' => 'bail|nullable|required_without:articulo_id',
                ];
            }
            case 'PUT':
            {
                return [
                    'valorempaque' => 'nullable|min:1|max:10',
                    'tipoimpuestocompra_id' => 'required',
                    'tipoimpuestoventa_id' => 'required',
                    'comprapuc_id' => 'required',
                    'ventapuc_id' => 'required',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
