<?php

namespace App\Http\Controllers;

use App\Prestamo;
use App\Cliente;
use App\Mail\OfertaEnviada;
use App\OfertaSolicitudes;
use App\Solicitudes;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Parametros;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OfertaSolicitudesController extends Controller
{

    public function getOfertas(Request $request){
        $post = $request->only('origen_s', 
                                'dni', 
                                'tCredito_S', 
                                'estado_s',
                                'Desde',
                                'Hasta'
                            );

        $origen = empty($post['origen_s']) ? null : $post['origen_s'];
        $dni = empty($post['dni']) ? null : $post['dni'];
        $tCredito_S = empty($post['tCredito_S']) ? null : $post['tCredito_S'];
        $estado_s = empty($post['estado_s']) ? null : $post['estado_s'];
        $Desde = empty($post['Desde']) ? null : $post['Desde'];
        $Hasta = empty($post['Hasta']) ? null : $post['Hasta'];

        if(auth()->user()->rol === 'Administrador'){
            $asd= new Solicitudes();
            $ofertas = OfertaSolicitudes::select("oferta_solicituds.*","ferreterias.ruc","ferreterias.razonSocial","ferreterias.vendedor")
            ->join("solicituds","solicituds.id","=","oferta_solicituds.id_solicitud")
            ->join("clientes","clientes.id","=","solicituds.id_cliente")
            ->leftjoin("ferreterias","ferreterias.id","=","solicituds.id_ferreteria")
            ->where('solicituds.status', 1)
            ->origen($origen)
            ->dni($dni)
            ->tipoPrestamo($tCredito_S)
            ->estado($estado_s)
            ->dateFrom($Desde)
            ->dateTo($Hasta)
            ->orderBy('oferta_solicituds.id', 'Desc')
            ->limit(500)
            ->get();
        }else{
            $ofertas = OfertaSolicitudes::select("oferta_solicituds.*","ferreterias.ruc","ferreterias.razonSocial","ferreterias.vendedor")
            ->where('id_banco', auth()->user()->id_banco)
            ->join("solicituds","solicituds.id","=","oferta_solicituds.id_solicitud")
            ->leftjoin("ferreterias","ferreterias.id","=","solicituds.id_ferreteria")
            ->where('solicituds.status', 1)
           // ->where('id_agente', auth()->user()->id)
            ->origen($origen)
            ->dni($dni)
            ->tipoPrestamo($tCredito_S)
            ->tipoPrestamo($estado_s)
            ->dateFrom($Desde)
            ->dateTo($Hasta)
            ->orderBy('oferta_solicituds.id', 'Desc')
            ->limit(500)            
            ->get();
        }
        
        $parametros = Parametros::select('id','descripcion')
        ->where('codigo', 'Prestamo')->get();

        $myCollectionObj = collect($ofertas);  
        $Ofertas = $this->paginate($myCollectionObj);
        return view('Ofertas',compact('Ofertas'),compact('parametros'));
    }

    public function storeOfertaSolicitud(Request $request){
        $post = $request->only('solicitudId', 
                                'mensaje', 
                                'aceptada', 
                                'monto_ofertado',
                                'plazo',
                                'monto_cuota',
                                'tea',
                                'tcea',
                                'calificacion',
                                'tCredito'
                            );

        $solicitud = Solicitudes::where('id', $post['solicitudId'])->first();

        
        
        // para actualizar el tipo de credito
        $des_prestamo = $post['tCredito'];
        $id_prest = 0;
                
        if($des_prestamo == 'Préstamos Personales'){
            $id_prest = 4;
        }elseif($des_prestamo == 'Créditos Vehiculares'){
            $id_prest = 5;
        }elseif($des_prestamo == 'Créditos Hipotecarios'){
            $id_prest = 6;
        }
        elseif($des_prestamo == 'Tarjetas de Crédito'){
            $id_prest = 7;
        }
        else{
            $id_prest = 8;          
        }

        if($solicitud->estado === 1){
            $ofertaSolicitud = OfertaSolicitudes::where('id_solicitud', $solicitud->id)
                                                ->where('id_banco', auth()->user()->id_banco)
                                                ->first();

            if(!$ofertaSolicitud){
                $ofertaSolicitud = new OfertaSolicitudes();
                $ofertaSolicitud->id_solicitud = $solicitud->id;
                $ofertaSolicitud->id_agente = auth()->user()->id;
                $ofertaSolicitud->id_banco = auth()->user()->id_banco;  
                $ofertaSolicitud->id_prestamo = $id_prest;
                $ofertaSolicitud->user_crea = auth()->user()->id;
                $ofertaSolicitud->mensaje = $post['mensaje']==null?"":$post['mensaje'];
                $ofertaSolicitud->monto_ofertado = $post['monto_ofertado'];
                $ofertaSolicitud->plazo = $post['plazo'];
                $ofertaSolicitud->monto_cuota = $post['monto_cuota'];
                $ofertaSolicitud->TEA = $post['tea'];
                $ofertaSolicitud->TCEA = $post['tcea'];
                $ofertaSolicitud->calificacion = $post['calificacion'];

                if($ofertaSolicitud->calificacion==1){
                    $ofertaSolicitud->estado=3;
                    $ofertaSolicitud->estadoCierre=2;
                }

                if($ofertaSolicitud->save()){
                    $password = Str::random(8);
                    $createUser = User::where('dni', $solicitud->cliente->dni)->first();
                    try{
                        if(!$createUser){
                            $createUser = new User();
                            $createUser->dni = $solicitud->cliente->dni;
                            $createUser->name = $solicitud->cliente->nombres;
                        }
                    
                        $createUser->email = $solicitud->cliente->correo;
                        $createUser->password = Hash::make($password);
                        $createUser->rol = 'Cliente';
                        
                        if($createUser->save())
                        {    
                            if($ofertaSolicitud->calificacion!=1){
                                
                                if($solicitud->origen=="MiYunta"){
                                    Mail::mailer('miyunta')->to($createUser->email)->send(new OfertaEnviada($solicitud, $ofertaSolicitud, $password));
                                }elseif($solicitud->origen=="tucasa"){
                                    Mail::mailer('tucasa')->to($createUser->email)->send(new OfertaEnviada($solicitud, $ofertaSolicitud, $password));
                                }else{
                                    Mail::mailer('Comercio')->to($createUser->email)->send(new OfertaEnviada($solicitud, $ofertaSolicitud, $password));
                                }
                            }
                        }
                    }catch(Exception $e){}
                    
                }
            }
        }
        return Redirect::route('ofertas');

    }


    public function getCurrentOfertasCliente(){
        $client = Cliente::where('dni', auth()->user()->dni)->first();

        $solicitudes = Solicitudes::where('id_cliente', $client->id)->get();
        $ofertas = [];
        foreach ($solicitudes as $key => $value) {
            $idsSolicitudes[] = $value->id;                     
        }

        $ofertas = OfertaSolicitudes::whereIn('id_solicitud', $idsSolicitudes)->get(); 
        return view('cliente/ofertas', [
            'ofertas' => $ofertas
        ]);
    }

    public function procesarOfertasCliente(Request $request){
        $post = $request->only('ofertaId', 'respuesta', 'solicitud');
        if($post['respuesta'] == 'Rechazar'){
            $oferta = OfertaSolicitudes::where('id', $post['ofertaId'])->first();
            $oferta->estado = 3;
            $oferta->estadoCierre=2;
            $oferta->save();
        }elseif($post['respuesta'] == 'Aceptar'){
            /*$ofertas = OfertaSolicitudes::where('id', '!=', $post['ofertaId'])
                                            ->where('id_solicitud', $post['solicitud'])
                                            ->get();
            foreach ($ofertas as $value) {
                $ofertaRechazada = OfertaSolicitudes::where('id', $value->id)->first();
                $ofertaRechazada->estado = 3;
                $ofertaRechazada->save();
            }*/
            $ofertaAceptada = OfertaSolicitudes::where('id', $post['ofertaId'])->first();
            $ofertaAceptada->estado = 2;
            if($ofertaAceptada->save()){
                $solicitud = Solicitudes::where('id', $ofertaAceptada->id_solicitud)->first();
                $solicitud->estado = 0;
                $solicitud->save();
            }
        }

        return Redirect::route('ofertasCliente');
    }

    public function getOfertasProcesadasCliente(){
        $client = Cliente::where('dni', auth()->user()->dni)->first();

        $solicitudes = Solicitudes::where('id_cliente', $client->id)->get();
        $ofertas = [];
        foreach ($solicitudes as $value) {
            $idsSolicitudes[] = $value->id;    
        }

        $ofertas = OfertaSolicitudes::whereIn('id_solicitud', $idsSolicitudes)
                                    ->where('estado', '!=', 1)->get();
        return view('cliente/ofertas-procesadas', [
            'ofertas' => $ofertas
        ]);
    }

    public function cerrarSolicitud(Request $request){
        $post = $request->only('ofertaSolicitudId','estadoCierre');

        //var_dump($post);die;

        OfertaSolicitudes::where('id', $post['ofertaSolicitudId'])->update(array('estadoCierre' => $post['estadoCierre']));
        //var_dump($post);die;

        return Redirect::route('ofertas');

    }
    
    public function paginate($items, $perPage = 25, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url('/ofertas')]);
    }

    
}

/*estacierre
0 pendiente
1 desembolsado
2 rechazado
estado (cl)
1 ofertado
2 aceptado
3 rechazado
calificacion
1 denegada
2 aprobado
3 preaprobado
*/ 