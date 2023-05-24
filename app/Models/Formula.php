<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Formula extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
            'codigo',
            'fechavence',
            'pagocontado',
            'pagocredito',
            'consecutivodian',
            'relacionempresa',
            'factura',
            'observacion',
            'fechapagoservicio',
            'eliminar',
            'creador_id',
            'tipo_facturacione_id'
    ];

    protected $table = "formulas";

    protected $dates = ['deleted_at'];

    public function tipofacturacione(){
        return $this->belongsTo(TipoFacturacione::class);
    }

    public function factulinea(){
        return $this->hasOne(Factulinea::class);
    }
}
