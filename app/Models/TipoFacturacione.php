<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TipoFacturacione extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'descripcion',
    ];

    protected $table = "tipo_facturaciones";

    protected $dates = ['deleted_at'];

    public function formula(){
        return $this->hasOne(Formula::class);
    }

}
