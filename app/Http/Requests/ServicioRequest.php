<?php

namespace App\Http\Requests;

use App\Models\Servicio;
use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
                        'codigo' => 'bail|min:3|max:30|required|unique:servicios',
                        'nombre' => 'bail|min:4|max:120|required',
                        'costounitario' => 'bail|min:1|required',
                        'posnombre' => 'bail|min:4|max:120|required',
                        'descripcion' => 'nullable|bail|min:4|max:120',
                        'descuento' => 'nullable|bail|min:1',
                        'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                        'grupoinventario_id' => 'nullable|bail',
                        'creador_id' => 'required',
                    ];
              }
              case 'PUT':
              {
                
                  $servicio = Servicio::findOrFail($this->servicio->id);
                    return [
                        'codigo' => 'bail|min:3|max:30|required|unique:servicios,codigo,'.$servicio->id,
                        'nombre' => 'bail|min:4|max:120|required',
                        'costounitario' => 'bail|min:1|required',
                        'posnombre' => 'bail|min:4|max:120|required',
                        'descripcion' => 'nullable|bail|min:4|max:120',
                        'descuento' => 'nullable|bail|min:1',
                        'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                        'grupoinventario_id' => 'nullable|bail',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
