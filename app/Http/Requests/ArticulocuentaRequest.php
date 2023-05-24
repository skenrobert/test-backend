<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticulocuentaRequest extends FormRequest
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
                        'cuentainventario_id' => 'nullable|bail',
                        'cuentaingreso_id' => 'nullable|bail',
                        'cuentacosto_id' => 'nullable|bail',
                        'articulo_id' => 'required',
                    ];
              }
              case 'PUT':
              {
                    return [
                        'cuentainventario_id' => 'bail|required',
                        'cuentaingreso_id' => 'bail|required',
                        'cuentacosto_id' => 'bail|required',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
