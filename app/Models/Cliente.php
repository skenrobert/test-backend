<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'paginaweb',
        'diascredito',
        'limitecredito',
        'observaciones',
        'estadisticas',
        'estatus',
        'mesajeEstatus',
        'clientedescuento',
        'creador_id',
    ];

    protected $table = "clientes";

    protected $dates = ['deleted_at'];
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }


}
