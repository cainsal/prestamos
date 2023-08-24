<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    protected $table = "solicituds";
    protected $fillable = [
        'id_cliente', 
        'id_prestamo', 
        'monto_solicitado',
        'origen',
        'user_crea',
        'user_update',
        'estado',
        'status'
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function solicitud()
    {
        return $this->belongsTo(Parametros::class, 'id_prestamo');
    }

    public function ofertaSolicitudes()
    {
        return $this->hasMany(OfertaSolicitudes::class);
    }

    public function ferreteria()
    {
        return $this->belongsTo(Ferreteria::class, 'id_ferreteria');
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
            return $query->where('solicituds.id_prestamo', '=', $tipoPrestamo);
        }
    }

    public function scopeDateFrom($query, $dateFrom){
        if($dateFrom && $dateFrom!="null"){
            return $query->where('solicituds.created_at', '>=',$dateFrom.' 00:00:00');
        }
    }

    public function scopeDateTo($query, $dateTo){
        if($dateTo && $dateTo!="null"){
            return $query->where('solicituds.created_at', '<=',$dateTo.' 23:59:59');
        }
    }
    
}