<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZonaventaRequest extends FormRequest
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
                    'codigo' => 'bail|min:2|max:20|required',
                    'descripcion' => 'bail|min:2|max:120|required',
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                  ];
              }
              case 'PUT':
              {
                    return [
                        'codigo' => 'bail|min:4|max:20|required',
                        'descripcion' => 'bail|min:4|max:120|required',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
