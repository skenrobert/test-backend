<?php

namespace App\Http\Requests;

use App\Models\Numeracionfacturacompra;
use Illuminate\Foundation\Http\FormRequest;

class NumeracionfacturacompraRequest extends FormRequest
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
                    'numeroresolucion' => 'bail|min:3|max:30|required|unique:numeracionfacturacompras',
                    'fecharesolucion' => 'date|required',
                    'prefijo' => 'min:2|max:100|required',
                    'consecutivodesde' => 'bail|min:2|max:30||required',
                    'consecutivohasta' => 'bail|min:2|max:30||required',
                    'vigenciameses' => 'bail|required',
                    'alertaconsecutiva' => 'bail|required',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                 ];
            }
            case 'PUT':
                {
                    $numeracionfacturacompra = Numeracionfacturacompra::findOrFail($this->numeracionfacturacompra->id);
                    return [
                      'numeroresolucion' => 'bail|min:3|max:30|required|unique:numeracionfacturacompras,numeroresolucion,'.$numeracionfacturacompra->id,
                      'fecharesolucion' => 'date|required',
                      'prefijo' => 'min:2|max:100|required',
                      'consecutivodesde' => 'bail|min:2|max:30||required',
                      'consecutivohasta' => 'bail|min:2|max:30||required',
                      'vigenciameses' => 'bail|required',
                      'alertaconsecutiva' => 'bail|required',
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
