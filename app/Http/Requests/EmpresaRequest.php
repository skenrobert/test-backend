<?php

namespace App\Http\Requests;

use App\Models\Empresa;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
                    'nombre' => 'required|min:3|max:40',
                    'razonsocial' => 'nullable|min:3|max:40',
                    'nit' => 'required|min:5|max:30|unique:empresas',
                    'direccion' => 'nullable|bail|min:5|max:192', 
                    'telefono1' => 'bail|nullable|min:5|max:20|required_without:telefono2',
                    'telefono2' => 'bail|nullable|min:5|max:20|required_without:telefono1',
                    'email' => 'required|bail|min:8|max:30|email|unique:empresas',
                    'representantelegal' => 'nullable|min:3|max:40',
                    'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                    'moneda' => 'required|min:1|max:1',
                    'texto1' => 'nullable|bail|min:5|max:192', 
                    'texto2' => 'nullable|bail|min:5|max:192', 
                    'texto3' => 'nullable|bail|min:5|max:192', 
                    'texto4' => 'nullable|bail|min:5|max:192', 
                    'fecharesolucion' => 'date|nullable',
                    'resolucionautoretenedor' => 'nullable|min:3|max:40',
                    'msgpuc' => 'nullable|bail|min:5', 
                    'contactocelular' => 'nullable|bail|min:7|max:20',
                    'contactonombre' => 'nullable|min:6|max:40',
                    'creador_id' => 'required',
                    'empresa_id' => 'required', 
                    'nivelgasto' => 'required|bail',
                    'puc_id' => 'required|bail', 
                    'ciudade_id' => 'nullable|bail', 
                    'ciiuclase_id' => 'required|bail', 
                    'tipocontribuyente_id' => 'nullable|bail', 
                    'tiposociedade_id' => 'nullable|bail', 
                    'regimene_id' => 'nullable|bail', 
                    'personeria_id' => 'nullable|bail', 
                    'contacto_id' => 'nullable|bail', 
                ];
            }
            case 'PUT':
            {
                $empresa = Empresa::findOrFail($this->empresa->id);

                return [
                    'nombre' => 'required|min:3|max:40',
                    'razonsocial' => 'nullable|min:3|max:40',
                    'nit' => 'required|min:5|max:30|unique:empresas,nit,'.$empresa->id,
                    'direccion' => 'nullable|bail|min:5|max:192', 
                    'telefono1' => 'bail|nullable|min:5|max:20|required_without:telefono2',
                    'telefono2' => 'bail|nullable|min:5|max:20|required_without:telefono1',
                    'email' => 'required|bail|min:8|max:30|email|unique:empresas,email,'.$empresa->id,
                    'representantelegal' => 'nullable|min:3|max:40',
                    'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                    // 'moneda' => 'required|min:1|max:1',
                    'texto1' => 'nullable|bail|min:5|max:192', 
                    'texto2' => 'nullable|bail|min:5|max:192', 
                    'texto3' => 'nullable|bail|min:5|max:192', 
                    'texto4' => 'nullable|bail|min:5|max:192', 
                    'fecharesolucion' => 'date|nullable',
                    'resolucionautoretenedor' => 'nullable|min:3|max:40',
                    'msgpuc' => 'nullable|bail|min:5', 
                    'contactocelular' => 'nullable|bail|min:7|max:20',
                    'contactonombre' => 'nullable|min:6|max:40',
                    'nivelgasto' => 'required|bail',
                    'puc_id' => 'required|bail', 
                    'ciudade_id' => 'nullable|bail', 
                    'ciiuclase_id' => 'required|bail', 
                    'tipocontribuyente_id' => 'nullable|bail', 
                    'tiposociedade_id' => 'nullable|bail', 
                    'regimene_id' => 'nullable|bail', 
                    'personeria_id' => 'nullable|bail', 
                    'contacto_id' => 'nullable|bail', 
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
