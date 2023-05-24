<?php

namespace App\Http\Requests;

use App\Models\Provisioncartera;
use Illuminate\Foundation\Http\FormRequest;

class ProvisioncarteraRequest extends FormRequest
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
                        'anio' => 'required|unique:provisioncarteras',
                        'metodoprovision' => 'required',
                        'empresa_id' => 'required',
                        'creador_id' => 'required',
                    ];
              }
              case 'PUT':
              {
                    $provisioncartera = Provisioncartera::findOrFail($this->provisioncartera->id);
                    return [
                        'anio' => 'unique:provisioncarteras,anio,'.$provisioncartera->id,
                        'metodoprovision' => 'required',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
