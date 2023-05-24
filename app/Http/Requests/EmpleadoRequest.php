<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
                    'sueldo' => 'nullable|min:6|max:15',
                    'observaciones' => 'nullable|bail|min:5|max:192', 
                    'estatus' => 'nullable|bail', 
                    'msgEstatus' => 'nullable|bail', 
                    'inicio' => 'date|nullable',
                    'fechaterminacion' => 'date|nullable',
                    'empresa_id' => 'required',
                    'creador_id' => 'required',
                    'tercero_id' => 'required',
                    'arl_id' => 'nullable|bail', 
                    'eps_id' => 'nullable|bail', 
                    'fondopensione_id' => 'nullable|bail', 
                    'fondocesantia_id' => 'nullable|bail', 
                    'cajacompensacione_id' => 'nullable|bail', 
                    'altoriesgoafp' => 'nullable|bail', 
                    'retencionfuente' => 'nullable|bail', 
                    'metodoretencionfuente' => 'nullable|bail', 
                    'metodoretencionfuente' => 'nullable|bail', 
                    'responsable_id' => 'nullable|bail', 
                    'tiposueldo_id' => 'nullable|bail', 
                    'cargoempresa_id' => 'nullable|bail', 
                    'nivelarl_id' => 'nullable|bail', 
                    'nivelriesgoarl_id' => 'nullable|bail', 
                    'periodicidadpago_id' => 'nullable|bail', 
                    'tipocontrato_id' => 'nullable|bail', 
                    'metodopagonomina_id' => 'nullable|bail', 
                ];
            }
            case 'PUT':
                {
                    return [
                        'sueldo' => 'nullable|min:6|max:15',
                        'observaciones' => 'nullable|bail|min:5|max:192', 
                        'estatus' => 'nullable|bail', 
                        'msgEstatus' => 'nullable|bail', 
                        'inicio' => 'date|nullable',
                        'fechaterminacion' => 'date|nullable',
                        'arl_id' => 'nullable|bail', 
                        'eps_id' => 'nullable|bail', 
                        'fondopensione_id' => 'nullable|bail', 
                        'fondocesantia_id' => 'nullable|bail', 
                        'cajacompensacione_id' => 'nullable|bail', 
                        'altoriesgoafp' => 'nullable|bail', 
                        'retencionfuente' => 'nullable|bail', 
                        'metodoretencionfuente' => 'nullable|bail', 
                        'metodoretencionfuente' => 'nullable|bail', 
                        'responsable_id' => 'nullable|bail', 
                        'tiposueldo_id' => 'nullable|bail', 
                        'cargoempresa_id' => 'nullable|bail', 
                        'nivelarl_id' => 'nullable|bail', 
                        'nivelriesgoarl_id' => 'nullable|bail', 
                        'periodicidadpago_id' => 'nullable|bail', 
                        'tipocontrato_id' => 'nullable|bail', 
                        'metodopagonomina_id' => 'nullable|bail', 
                    ];
                }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
