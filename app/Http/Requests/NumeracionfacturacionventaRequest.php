<?php

namespace App\Http\Requests;

use App\Models\Numeracionfacturaventa;
use Illuminate\Foundation\Http\FormRequest;

class NumeracionfacturacionventaRequest extends FormRequest
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
                    'numeroresolucion' => 'min:3|max:30|required|unique:numeracionfacturaventas',
                    'fecharesolucion' => 'date|required',
                    'prefijo' => 'min:2|max:100|required',
                    'consecutivodesde' => 'min:2|max:30|required',
                    'consecutivohasta' => 'min:2|max:30|required',
                    'vigenciameses' => 'min:1|max:2|required',
                    'alertaconsecutiva' => 'min:1|required',
                    'creador_id' => 'required',
                    'empresa_id' => 'required',
                    'tipofacturacione_id' => 'required',
                  ];
              }
              case 'PUT':
              {
                  $numeracionfacturaventa = Numeracionfacturaventa::findOrFail($this->numeracionfacturaventa->id);
                    return [
                      'numeroresolucion' => 'min:3|max:30|required|unique:numeracionfacturaventas,numeroresolucion,'.$numeracionfacturaventa->id,
                      'fecharesolucion' => 'date|required',
                      'prefijo' => 'min:2|max:100|required',
                      'consecutivodesde' => 'min:2|max:30|required',
                      'consecutivohasta' => 'min:2|max:30|required',
                      'vigenciameses' => 'min:1|max:2|required',
                      'alertaconsecutiva' => 'min:1|required',
                      'tipofacturacione_id' => 'required',
                    ];
                }
                case 'PATCH':
                {
                }
                default:break;
            }
        }
    }
    