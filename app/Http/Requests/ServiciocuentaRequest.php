<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiciocuentaRequest extends FormRequest
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
                        'cuentaingreso_id' => 'nullable|bail',
                        'cuentacosto_id' => 'nullable|bail',
                        'servicio_id' => 'required',
                    ];
              }
              case 'PUT':
              {
                    return [
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
