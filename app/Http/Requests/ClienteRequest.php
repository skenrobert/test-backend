<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
                    'diascredito' => 'nullable|bail|max:2',
                    'limitecredito' => 'nullable|bail|min:1|max:10', 
                    'observaciones' => 'nullable|bail|min:5|max:192', 
                    'estadisticas' => 'nullable|bail|min:5|max:3', 
                    'estatus' => 'nullable|bail', 
                    'mesajeEstatus' => 'nullable|bail', 
                    'clientedescuento' => 'nullable|bail', 
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'clasificacioncliente_id' => 'nullable|bail',
                    'tercero_id' => 'required',
                    'clientedescuento_id' => 'nullable|bail',
                    'terminopago_id' => 'nullable|bail',
                    'gradodeudore_id' => 'nullable|bail',
                  ];
              }
              case 'PUT':
                  {
                      return [
                        'paginaweb' => 'nullable|min:11|max:50',
                        'diascredito' => 'nullable|bail|max:2',
                        'limitecredito' => 'nullable|bail|min:1|max:10', 
                        'observaciones' => 'nullable|bail|min:5|max:192', 
                        'estadisticas' => 'nullable|bail|min:5|max:3', 
                        'estatus' => 'nullable|bail', 
                        'mesajeEstatus' => 'nullable|bail', 
                        'clientedescuento' => 'nullable|bail', 
                        'clasificacioncliente_id' => 'nullable|bail',
                        'clientedescuento_id' => 'nullable|bail',
                        'terminopago_id' => 'nullable|bail',
                        'gradodeudore_id' => 'nullable|bail',
                      ];
                  }
              case 'PATCH':
              {
              }
              default:break;
          }
    }
}
