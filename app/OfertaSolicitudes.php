<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaSolicitudes extends Model
{
    protected $table = "oferta_solicituds";
    protected $fillable = [
        'id_solicitud', 
        'id_agente',
        'id_banco',
        'id_prestamo',
        'user_crea',
        'user_update',
        'mensaje',
        'monto_ofertado',
        'plazo',
        'monto_cuota',
        'tea',
        'tcea',
        'calificacion',
        'estadoCierre'
    ];
    public function solicitud()
    {
        return $this->belongsTo(Solicitudes::class, 'id_solicitud');
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'id_agente');
    }

    public function banco()
    {
        return $this->belongsTo(Parametros::class, 'id_banco');
    }

    public function prestamo()
    {
        return $this->belongsTo(Parametros::class, 'id_prestamo');
    }

    public function scopeOrigen($query, $origen){
        if($origen && $origen!="null"){
            return $query->where('origen', '=', $origen);
        }
    }

    public function scopeDni($query, $dni){
        if($dni && $dni!="null"){
            return $query->where('clientes.dni', 'LIKE', "%$dni%");
        }
    }

    public function scopeTipoPrestamo($query, $tipoPrestamo){
        if($tipoPrestamo && $tipoPrestamo!="null"){
            return $query->where('id_prestamo', '=', $tipoPrestamo);
        }
    }

    public function scopeEstado($query, $estado){
        if($estado && $estado!="null"){
            return $query->where('oferta_solicituds.estado', '=', $estado);
        }
    }

    public function scopeDateFrom($query, $dateFrom){
        if($dateFrom && $dateFrom!="null"){
            return $query->where('oferta_solicituds.created_at', '>=',$dateFrom.' 00:00:00');
        }
    }

    public function scopeDateTo($query, $dateTo){
        if($dateTo && $dateTo!="null"){
            return $query->where('oferta_solicituds.created_at', '<=',$dateTo.' 23:59:59');
        }
    }
}
