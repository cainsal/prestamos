<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ferreteria extends Model
{
    protected $table = "ferreterias";
    protected $fillable = [
        'ruc', 
        'razonSocial',
        'vendedor'
    ];

    public function solicitud()
    {
        return $this->hasOne(Solicitudes::class);
    }
}
