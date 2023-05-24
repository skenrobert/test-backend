<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'codigo',
        'nombre',
        'precio',
        'lote',
        'vencimiento',
        'estado',
    ];

    protected $table = "productos";

    protected $dates = ['deleted_at'];

    public function factulineas(){
        return $this->belongsToMany(Factulinea::class, 'factulinea_producto');
      }
}
