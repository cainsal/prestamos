<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametros extends Model
{
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'codigo',
        'user_crea',
        'user_update'
    ];
    
    public function solicitudes()
    {
        return $this->hasMany(Solicitudes::class);
    }

    public function agentes()
    {
        return $this->hasMany(User::class);
    }
}
