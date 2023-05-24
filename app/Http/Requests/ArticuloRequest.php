<?php

namespace App\Http\Requests;

use App\Models\Articulo;
use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
                        'codigo' => 'bail|min:3|max:30|required|unique:articulos',
                        'nombre' => 'bail|min:4|max:120|required',
                        'costounitario' => 'bail|min:2|max:120|required',
                        'costobarras' => 'bail|min:1|max:120|required',
                        'pesovolumen' => 'bail|min:1|max:10|required',
                        // 'costounitario'=>'required|numeric|regex:/^[\d]{0,20}(\.[\d]{1,2,3})?$/',
                        'posnombre' => 'bail|min:4|max:120|required',
                        'descripcion' => 'nullable|bail|min:4|max:120',
                        'referencia' => 'nullable|bail|min:4|max:120',
                        'plu' => 'nullable|bail|min:4|max:120',
                        'reginvima' => 'nullable|bail|min:2|max:10',
                        'fechainvima' => 'nullable|bail|min:2|max:10',
                        'existenciaminima' => 'nullable|bail|min:1|max:10',
                        'cantidadordenar' => 'nullable|bail|min:1|max:10',
                        'descuento' => 'nullable|bail|min:1',
                        'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                        'marca_id' => 'nullable|bail',
                        'grupoinventario_id' => 'nullable|bail',
                        'creador_id' => 'required',
                    ];
              }
              case 'PUT':
              {
                  $articulo = Articulo::findOrFail($this->articulo->id);
                    return [
                        'codigo' => 'bail|min:3|max:30|required|unique:articulos,codigo,'.$articulo->id,
                        'nombre' => 'bail|min:4|max:120|required',
                        'costounitario' => 'bail|min:2|max:120|required',
                        'costobarras' => 'bail|min:1|max:120|required',
                        'pesovolumen' => 'bail|min:1|max:10|required',
                        'posnombre' => 'bail|min:4|max:120|required',
                        'descripcion' => 'nullable|bail|min:4|max:120',
                        'referencia' => 'nullable|bail|min:4|max:120',
                        'plu' => 'nullable|bail|min:4|max:120',
                        'reginvima' => 'nullable|bail|min:2|max:10',
                        'fechainvima' => 'nullable|bail|min:2|max:10',
                        'existenciaminima' => 'nullable|bail|min:1|max:10',
                        'cantidadordenar' => 'nullable|bail|min:1|max:10',
                        'descuento' => 'nullable|bail|min:1',
                        'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                        'marca_id' => 'nullable|bail',
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
