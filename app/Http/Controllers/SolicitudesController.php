<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Ferreteria;
use App\Solicitudes;
use App\Parametros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OfertaSolicitudes;
use Exception;

use App\Http\Controllers\Input;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SolicitudesController extends Controller
{
    public function getActiveSolicitudes(Request $request){
        

        $post = $request->only('origen_s', 
                                'dni_s', 
                                'tCredito_s',
                                'Desde',
                                'Hasta'
                            );                         
        $origen = empty($post['origen_s']) ? null  : $post['origen_s'];     
        $dni = empty($post['dni_s']) ? null  : $post['dni_s'];        
        $tCredito = empty($post['tCredito_s']) ? null : $post['tCredito_s'];
        $Desde = empty($post['Desde']) ? null : $post['Desde'];
        $Hasta = empty($post['Hasta']) ? null : $post['Hasta'];

        $dni = $request->input('dni_s');

        if(auth()->user()->rol === 'Administrador'){
            $activeSolicitudes = Solicitudes::select("solicituds.*","ferreterias.ruc","ferreterias.razonSocial","ferreterias.vendedor")
            ->join("clientes","clientes.id","=","solicituds.id_cliente")
            ->leftjoin("ferreterias","ferreterias.id","=","solicituds.id_ferreteria")
            ->where('solicituds.estado', 1)
            ->where('solicituds.status', 1)
            ->origen($origen)
            ->dni($dni)
            ->tipoPrestamo($tCredito)
            ->dateFrom($Desde)
            ->dateTo($Hasta)
            //->orderBy('created_at', 'Asc')
            ->orderBy('solicituds.id', 'Asc')
            ->limit(500)
            ->get();

            $parametros = Parametros::select('id','descripcion')
            ->where('codigo', 'Prestamo')->get();

        }else{
            $activeSolicitudes = Solicitudes::select("solicituds.*","ferreterias.ruc","ferreterias.razonSocial","ferreterias.vendedor")
            ->join("clientes","clientes.id","=","solicituds.id_cliente")
            ->leftjoin("ferreterias","ferreterias.id","=","solicituds.id_ferreteria")
            ->leftjoin("oferta_solicituds","oferta_solicituds.id","=","solicituds.id")
            ->where('solicituds.estado', 1)
            ->where('solicituds.status', 1)
            ->origen($origen)
            ->dni($dni)
            ->tipoPrestamo($tCredito)
            ->dateFrom($Desde)
            ->dateTo($Hasta)
            // ->whereNull('oferta_solicituds.id_agente')
            // ->orWhere(function ($activeSolicitudes) {
            //     $activeSolicitudes->where('id_banco','!=', auth()->user()->id_banco)->orWhereNull('oferta_solicituds.id_agente');
            // })
            //->orderBy('created_at', 'Asc')
            ->orderBy('solicituds.id', 'Asc')
            // ->offset(4000)
            // ->limit(4000)
            
            ->get();
            
            
            $parametros = Parametros::select('id','descripcion')
            ->where('codigo', 'Prestamo')->get();            

            foreach ($activeSolicitudes as $key => $value){
                $checkAlreadySelect = OfertaSolicitudes::where('id_solicitud', $value->id)                
                ->where('id_banco', auth()->user()->id_banco)
                ->first();
                if($checkAlreadySelect){
                    $activeSolicitudes->forget($key);
                }
            }
        }
        
        

        $myCollectionObj = collect($activeSolicitudes);  
        $Solicitudes = $this->paginate($myCollectionObj->forPage(1, 500));
            
        
        return view('Solicitudes', compact('Solicitudes'),compact('parametros'));
    }  

    public function createClientSolicitudApi(Request $request){
        $post = $request->only('solicitud');
        $error = false;

        $solicitud = $post['solicitud'];
        DB::beginTransaction();
            try {

                //echo json_encode($solicitud);die;
                $clienteValidar = Cliente::where('correo', $solicitud['correo'])->first();

                if($clienteValidar!=null){
                    if($clienteValidar->dni!=$solicitud['dni']){
                        throw new Exception('Este correo ya se encuentra asociado a otro usuario!.');
                    }
                }


                $cliente = Cliente::where('dni', $solicitud['dni'])->first();

                if(!$cliente){
                    $cliente  = new Cliente();
                }
                $cliente->dni     = $solicitud['dni'];
                $cliente->nombres = $solicitud['nombres'];
                $cliente->correo  = $solicitud['correo'];
                $cliente->celular = $solicitud['celular'];
                if($cliente->save()){
                    if(!empty($solicitud['ruc'])){
                        $createFerreteria = new Ferreteria();
                        $createFerreteria->ruc = $solicitud['ruc'];
                        $createFerreteria->razonSocial = $solicitud['razonSocial'];
                        $createFerreteria->vendedor = $solicitud['vendedor'];
                        $createFerreteria->save();
                    }
                    $createSolicitud  = new Solicitudes();
                    $createSolicitud->id_cliente  = $cliente->id;
                    $createSolicitud->id_prestamo = $solicitud['id_prestamo'];
                    $createSolicitud->id_ferreteria = empty($createFerreteria->id) ? null : $createFerreteria->id;
                    $createSolicitud->origen = $solicitud['origen'];
                    $createSolicitud->monto_solicitado = empty($solicitud['monto_solicitado']) ? null : $solicitud['monto_solicitado'];
                    $createSolicitud->save();
                    
                }
            } catch (\Exception $e) {
                $error = true;
                $message = $e->getMessage();
            }
            if ($error) {
                DB::rollback();
                $error = true;
                //$message = "Parece que hubo un error al tratar de registrar la solicitud";
                
            } else {
                DB::commit();
                $message = "Solicitud realizada con exito";
            }
        $response = array('error' => $error, 'message' => $message);

        return response()->json($response);

    }

    public function paginate($items, $perPage = 25, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);        
        $items = $items instanceof Collection ? $items : Collection::make($items);
                   
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url('/solicitudes')]);
    }
}