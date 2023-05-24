<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
      'nombres',//
      'apellidos',//
      'imagen',
      'razonsocial',//
      'representantelegal',
      'identificacion',//
      'direccion',//
      'direccion2',//
      'celular',//
      'telefono',//
      'email',//
      'cumpleanios',//
      'contactocelular',//
      'contactonombre',//
      'tipoidentificacione_id'
    ];

    protected $table = "personas";

    protected $dates = ['deleted_at'];

    public function users(){
      return $this->hasMany(User::class);
    }

    public function clientes(){
      return $this->hasOne(Cliente::class);
    }

    public function tipoidentificacione(){
       return $this->belongsTo(Tipoidentificacione::class);
    }
}
