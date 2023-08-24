<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'dni', 
        'correo', 
        'nombres',
        'celular',
        'user_crea',
        'user_update',
        'estado'
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitudes::class);
    }
}
