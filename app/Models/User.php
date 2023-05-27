<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'email',
        'password',
        'imagen',
        'estatus',
        'msgEstatus',
        'creador_id',
        'persona_id',
    ];

    protected $table = "users";

    protected $dates = ['deleted_at'];

    /*****************  Accesores  *****************/
    
    public function getUsernameAttribute($valor)//vista
    {
        //return ucfirst($valor);
        // return strtoupper($value);
        return ucwords($valor);
    }

/*****************  Mutadores  *****************/

    public function setEmailAttribute($valor)//DB
    {
        $this->attributes['email'] = strtolower($valor);
    }
    //************************************************* */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',  'estatus' => 'boolean',
    ];


    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function formulas(){
        return $this->hasMany(Formula::class);
    }

}
