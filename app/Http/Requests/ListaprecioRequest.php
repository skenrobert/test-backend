<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaprecioRequest extends FormRequest
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
                    'precio0' => 'bail|min:1|nullable',
                    'precio1' => 'bail|min:1|nullable',
                    'precio2' => 'bail|min:1|nullable',
                    'precio3' => 'bail|min:1|nullable',
                    'precio4' => 'bail|min:1|nullable',
                    'precio5' => 'bail|min:1|nullable',
                    'precio6' => 'bail|min:1|nullable',
                    'precio7' => 'bail|min:1|nullable',
                    'precio8' => 'bail|min:1|nullable',
                    'precio9' => 'bail|min:1|nullable',
                    'ecommerceprecio' => 'bail|min:1|nullable',
                    'servicio_id' => 'required',
                    'creador_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'precio0' => 'bail|min:1|required',
                    'precio1' => 'bail|min:1|required',
                    'precio2' => 'bail|min:1|required',
                    'precio3' => 'bail|min:1|required',
                    'precio4' => 'bail|min:1|required',
                    'precio5' => 'bail|min:1|required',
                    'precio6' => 'bail|min:1|required',
                    'precio7' => 'bail|min:1|required',
                    'precio8' => 'bail|min:1|required',
                    'precio9' => 'bail|min:1|required',
                    'ecommerceprecio' => 'bail|min:1|required',
                ];
            }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
