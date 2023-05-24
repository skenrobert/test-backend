<?php

namespace App\Http\Requests;

use App\Models\Bodega;
use Illuminate\Foundation\Http\FormRequest;

class BodegaRequest extends FormRequest
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
                  'codigo' => 'min:2|max:20|unique:bodegas|required',
                  'descripcion' => 'min:3|max:100|required',
                  'proveedore_id' => 'bail|nullable',
                  'cliente_id' => 'bail|nullable',
                  'tipobodega_id' => 'required',
                  'creador_id' => 'required',
                  'empresa_id' => 'required',
                ];
            }
            case 'PUT':
                {
                  $bodega = Bodega::findOrFail($this->bodega->id);
                    return [
                      'codigo' => 'min:2|max:20|unique:bodegas,codigo,'.$bodega->id,
                      'descripcion' => 'min:3|max:100|required',
                      'proveedore_id' => 'bail|nullable',
                      'cliente_id' => 'bail|nullable',
                      'tipobodega_id' => 'required',
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
