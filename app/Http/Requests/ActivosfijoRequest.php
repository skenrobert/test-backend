<?php

namespace App\Http\Requests;

use App\Models\Activosfijo;
use Illuminate\Foundation\Http\FormRequest;

class ActivosfijoRequest extends FormRequest
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
                  'codigo' => 'min:2|max:20|unique:activosfijos|required',
                  'nombre' => 'min:3|max:20|required',
                  'gruposactivosfijo_id' => 'required',
                  'estadoactivo_id' => 'required',
                  'ciudade_id' => 'required',
                  'creador_id' => 'required',
                  'empresa_id' => 'required',
                  'puc_id' => 'required',
                  'centrocosto_id' => 'bail|nullable',
                  'direccion' => 'nullable|min:5|max:100',
                  'adquisicionfecha' => 'date|nullable',
                  'costohora' => 'bail|nullable',
                  'depreciarmeses' => 'bail|nullable',
                  'depreciaranio' => 'bail|nullable',
                  'depreciarmesescompra' => 'bail|nullable',
                  'depreciaraniocompra' => 'bail|nullable',
                  'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                  'depreciaraniocompraniif' => 'bail|min:1|max:2|nullable',
                  'depreciarmesescompraniif' => 'bail|min:1|max:2|nullable',
                  'salvamentoniif' => 'bail|min:1|max:2|nullable',
                  'vlrnrorazonable' => 'bail|min:1|nullable',
                  'niif_id' => 'bail|nullable',
                ];
            }
            case 'PUT':
                {
                  $activosfijo = Activosfijo::findOrFail($this->activosfijo->id);
                    return [
                      'codigo' => 'min:2|max:20|unique:activosfijos,codigo,'.$activosfijo->id,
                      'nombre' => 'min:3|max:20|required',
                      'gruposactivosfijo_id' => 'required',
                      'estadoactivo_id' => 'required',
                      'ciudade_id' => 'required',
                      'puc_id' => 'required',
                      'centrocosto_id' => 'bail|nullable',
                      'direccion' => 'nullable|min:5|max:100',
                      'adquisicionfecha' => 'date|nullable',
                      'costohora' => 'bail|nullable',
                      'depreciarmeses' => 'bail|nullable',
                      'depreciaranio' => 'bail|nullable',
                      'depreciarmesescompra' => 'bail|nullable',
                      'depreciaraniocompra' => 'bail|nullable',
                      'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                      'depreciaraniocompraniif' => 'bail|min:1|max:2|nullable',
                      'depreciarmesescompraniif' => 'bail|min:1|max:2|nullable',
                      'salvamentoniif' => 'bail|min:1|max:2|nullable',
                      'vlrnrorazonable' => 'bail|min:1|nullable',
                      'niif_id' => 'bail|nullable',
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
