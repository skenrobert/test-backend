<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteresesimplicitoRequest extends FormRequest
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
                    'fecha' => 'date|required',
                    'dias' => 'min:1|max:2|required',
                    'porcentajes' => 'min:2|max:30|required',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                  ];
              }
              case 'PUT':
              {
                return [
                    'fecha' => 'date|required',
                    'dias' => 'min:1|max:2|required',
                    'porcentajes' => 'min:2|max:30|required',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
