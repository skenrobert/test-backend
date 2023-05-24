<?php

namespace App\Http\Requests;

use App\Models\Unidadesmedidalistaprecio;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UnidadesmedidalistaprecioRequest extends FormRequest
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
                    'factorconversion' => 'bail|min:10|nullable',
                    'articulo_id' => 'required',
                    'creador_id' => 'required',
                  ];
              }
              case 'PUT':
              {

                // $unidadesmedidalistaprecio = Unidadesmedidalistaprecio::findOrFail($this->unidadesmedidalistaprecio->id);

                // dd($unidadesmedidalistaprecio->articulo->costounitario);

                    return [
                        // 'precio1' => 'numeric|nullable|digits:'.$unidadesmedidalistaprecio->articulo->costounitario,
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
                        'factorconversion' => 'bail|min:1|max:10|nullable',
                        'unidadesmedida_id' => 'required',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
