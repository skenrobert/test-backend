<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChequeraRequest extends FormRequest
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
                    'prefijo' => 'min:1|max:10|required',
                    'numeroinicial' => 'min:1|max:10|required',
                    'numerofinal' => 'min:2|max:10|required',
                    'ultimoconsecutivo' => 'min:1|max:10|required',
                    'cuentabancaria_id' => 'required',
                    'creador_id' => 'required',
                  ];
              }
              case 'PUT':
            {
                return [
                    'prefijo' => 'min:1|max:10|required',
                    'numeroinicial' => 'min:1|max:10|required',
                    'numerofinal' => 'min:2|max:10|required',
                    'ultimoconsecutivo' => 'min:1|max:10|required',
                    'cuentabancaria_id' => 'required',
                ];
            }
              case 'PATCH':
              {
              }
              default:break;
          }
    }
}
