<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfileRequest extends FormRequest
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
                  'descripcion' => 'required|min:5|max:100',
                  'nivel' => 'required|bail',
                  'creador_id' => 'required',
                 ];
            }
            case 'PUT':
                {
                    return [
                        'descripcion' => 'required|min:5|max:100',
                        'nivel' => 'required|bail',
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
