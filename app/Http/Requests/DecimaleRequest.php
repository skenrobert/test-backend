<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecimaleRequest extends FormRequest
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
                return [];
            }
            case 'PUT':
            {
                return [
                    'decimalPeso' => 'required|max:1',
                    'decimalMoneda' => 'required|max:1',
                ];
             }
            case 'PATCH':
            {
            }
            default:break;
        }
    }
}
