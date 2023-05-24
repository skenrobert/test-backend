<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Factulinea extends Model
{
    use HasFactory, softDeletes;
    protected $fillable =[
        'descripcion',
    ];
    protected $table = "factulineas";
    protected $dates = ['deleted_at'];

    public function productos(){
        return $this->belongsToMany(Producto::class, 'factulinea_producto')->withTimestamps();
      }

      public function formula(){
        return $this->belongsTo(Formula::class);
    }
      
}
