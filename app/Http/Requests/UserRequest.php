<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class UserRequest extends FormRequest
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
                    'email' => 'bail|min:8|max:30|required|email|unique:users',
                    'password' => 'bail|min:8|max:120|required',
                    'empresa_id' => 'required',
                    'tercero_id' => 'nullable|bail',
                    'creador_id' => 'required',
                    'perfile_id' => 'required',
                    'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                  ];
              }
              case 'PUT':
              {
                  $user = User::findOrFail($this->user->id);
                    return [
                      'email' => 'bail|min:8|max:30|email|required|unique:users,email,'.$user->id,
                      'password' => 'bail|nullable|min:8|max:120',
                      'tercero_id' => 'nullable|bail',
                      'perfile_id' => 'required',
                      'imagen' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|nullable',
                    ];
              }
              case 'PATCH':
              {
              }
              default:break;
          }

      }
}
