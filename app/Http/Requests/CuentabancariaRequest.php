<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentabancariaRequest extends FormRequest
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
                    'numerocuenta' => 'min:5|max:50|required',
                    'entidadfinanciera' => 'min:5|max:50|required',
                    'oficinanumero' => 'min:5|max:50|required',
                    'titularcuenta' => 'min:5|max:50|required',
                    'apertura' => 'date|nullable',
                    'vencimiento' => 'date|nullable',
                    'cupo' => 'nullable|bail|min:1|max:50',
                    'tipocuenta_id' => 'required',
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'cuentapropiaempresa' => 'required',
                  ];
              }
              case 'PUT':
                {
                    return [
                    'numerocuenta' => 'min:5|max:50|required',
                    'entidadfinanciera' => 'min:5|max:50|required',
                    'oficinanumero' => 'min:5|max:50|required',
                    'titularcuenta' => 'min:5|max:50|required',
                    'apertura' => 'date|nullable',
                    'vencimiento' => 'date|nullable',
                    'cupo' => 'nullable|bail|min:1|max:50',
                    'tipocuenta_id' => 'required',
                    'cuentapropiaempresa' => 'required',
                    ];
                }
              case 'PATCH':
              {
              }
              default:break;
          }
    }
}
