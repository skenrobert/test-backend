<?php

namespace App\Http\Requests;

use App\Models\Tercero;
use Illuminate\Foundation\Http\FormRequest;

class TerceroRequest extends FormRequest
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
                    'nombres' => 'required|min:3|max:40',
                    'apellidos' => 'nullable|min:3|max:40',
                    'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                    'razonsocial' => 'nullable|min:3|max:40',
                    'representantelegal' => 'nullable|min:5|max:40',
                    'identificacion' => 'required|min:5|max:30|unique:terceros',
                    'direccion' => 'nullable|bail|min:5|max:192', 
                    'direccion2' => 'nullable|bail|min:5|max:192', 
                    'telefono' => 'bail|nullable|min:7|max:20|required_without:celular',
                    'celular' => 'bail|nullable|min:9|max:20|required_without:telefono',
                    'email' => 'nullable|bail|min:8|max:30|email|unique:terceros',
                    'cumpleanios' => 'date|nullable',
                    'contactocelular' => 'nullable|bail|min:7|max:20',
                    'contactonombre' => 'nullable|min:6|max:40',
                    'autoretenedorica' => 'nullable|bail', 
                    'autoretenedorrenta' => 'nullable|bail', 
                    'creador_id' => 'required',
                    'ciudade_id' => 'nullable|bail', 
                    'tipodireccione_id' => 'nullable|bail', 
                    'tipodireccione2_id' => 'nullable|bail', 
                    'tipoidentificacione_id' => 'required|bail', 
                    'contacto_id' => 'nullable|bail', 
                    'personeria_id' => 'nullable|bail', 
                    'ciiuclase_id' => 'nullable|bail', 
                    'regimene_id' => 'nullable|bail', 
                    'tipocontribuyente_id' => 'nullable|bail', 
                ];
            }
            case 'PUT':
            {
                $tercero = Tercero::findOrFail($this->tercero->id);

                return [
                    'nombres' => 'required|min:3|max:40',
                    'apellidos' => 'nullable|min:3|max:40',
                    'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                    'razonsocial' => 'nullable|min:3|max:40',
                    'representantelegal' => 'nullable|min:5|max:40',
                    'identificacion' => 'required|min:5|max:30|unique:terceros,identificacion,'.$tercero->id,
                    'direccion' => 'nullable|bail|min:5|max:192', 
                    'direccion2' => 'nullable|bail|min:5|max:192', 
                    'telefono' => 'bail|nullable|min:7|max:20|required_without:celular',
                    'celular' => 'bail|nullable|min:9|max:20|required_without:telefono',
                    'email' => 'nullable|bail|min:8|max:30|email|unique:terceros,email,'.$tercero->id,
                    'cumpleanios' => 'date|nullable',
                    'contactocelular' => 'nullable|bail|min:7|max:20',
                    'contactonombre' => 'nullable|min:6|max:40',
                    'autoretenedorica' => 'nullable|bail', 
                    'autoretenedorrenta' => 'nullable|bail', 
                    'ciudade_id' => 'nullable|bail', 
                    'tipodireccione_id' => 'nullable|bail', 
                    'tipodireccione2_id' => 'nullable|bail', 
                    'tipoidentificacione_id' => 'nullable|bail', 
                    'contacto_id' => 'nullable|bail', 
                    'personeria_id' => 'nullable|bail', 
                    'ciiuclase_id' => 'nullable|bail', 
                    'regimene_id' => 'nullable|bail', 
                    'tipocontribuyente_id' => 'nullable|bail', 
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
