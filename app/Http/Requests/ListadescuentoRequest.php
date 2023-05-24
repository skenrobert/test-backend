<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListadescuentoRequest extends FormRequest
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
                    'empresa_id' => 'required',
                    'porcentaje' => 'bail|min:1|max:40|required',
                    'descripcion' => 'bail|min:3|max:40|required',
                    'inicio' => 'date|nullable',
                    'fin' => 'date|nullable|after_or_equal:inicio', // before, date_equals, before_or_equals, after
                ];
            }
            case 'PUT':
            {
                return [
                    'porcentaje' => 'bail|min:1|max:40|required',
                    'descripcion' => 'bail|min:3|max:40|required',
                    'inicio' => 'date|nullable',
                    'fin' => 'date|nullable|after_or_equal:inicio',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
