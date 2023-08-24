@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ofertas Procesadas</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Agente</th>
                            <th scope="col">N° Solicitud</th>
                            <th scope="col">Tipo Prestamo</th>
                            <th scope="col">Entidad Bancaria</th>
                            <th scope="col">Monto Ofertado</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ofertas as $oferta)
                            <tr>
                                <td>{{ $oferta->agente->name}}</td>
                                <td>{{ $oferta->solicitud->id}}</td>
                                <td>{{ $oferta->solicitud->solicitud->descripcion}}</td>
                                <td>{{ $oferta->banco->nombre}}</td>
                                <td>{{ $oferta->monto_ofertado}}</td>
                                <td>
                                    @if($oferta->estado === 1)
                                        <span class="badge badge-warning p-2">Ofertado</span>
                                    @elseif ($oferta->estado === 2)
                                        <span class="badge badge-success p-2">Aceptado</span>
                                    @else
                                        <span class="badge badge-danger p-2">Rechazada</span>
                                    @endif
                                </td>
                                <td>{{ $oferta->updated_at->todatestring() }}</td>
                                <td>
                                <button onclick="myFunction(this)" type="button" class="btn btn-primary" 
                                            data-id="{{ $oferta->id}}"
                                            data-id_solicitud="{{ $oferta->solicitud->id}}"
                                            data-dni="{{ $oferta->solicitud->cliente->dni}}"
                                            data-celular="{{ $oferta->solicitud->cliente->celular}}" 
                                            data-email="{{ $oferta->solicitud->cliente->correo}}" 
                                            data-tCredito="{{ $oferta->solicitud->solicitud->descripcion}}" 
                                            data-monto_ofertado="{{ $oferta->monto_ofertado}}" 
                                            data-plazo="{{ $oferta->plazo}}"
                                            data-monto_cuota="{{ $oferta->monto_cuota}}"
                                            data-tea="{{ $oferta->TEA}}"
                                            data-tcea="{{ $oferta->TCEA}}"
                                            data-banco="{{ $oferta->banco->nombre}}"
                                            data-toggle="modal" 
                                            data-target="#oferta">
                                            Detalles
                                </button>
                                </td>
                            @empty
                                <td colspan="9">
                                    <div class="alert alert-danger" role="alert">
                                        Lo siento, no hay ofertas disponibles :(
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="modal fade" id="oferta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Oferta Enviada</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form >
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="ofertaId" class="form-control" id="id" readonly>
                                        <input type="hidden" name="solicitud" class="form-control" id="solicitud" readonly>
                                        <label for="dni" class="col-form-label">DNI Solicitante</label>
                                        <input type="text" class="form-control" id="dni" readonly>
                                        <label for="celular" class="col-form-label">Celular Solicitante</label>
                                        <input type="text" class="form-control" id="celular" readonly>
                                        <label for="Monto" class="col-form-label">Monto Oferta</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">S/</span>
                                            </div>
                                            <input type="text" name="monto_ofertado" readonly class="form-control" id="monto_ofertado">
                                        </div>
                                        <label for="Monto" class="col-form-label">Monto Cuota</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">S/</span>
                                            </div>
                                            <input type="text" name="monto_cuota" readonly class="form-control" id="monto_cuota">
                                        </div>
                                        <label for="Monto" class="col-form-label">TEA</label>
                                        <div class="input-group">
                                            <input type="text" name="tea" readonly class="form-control" id="tea">
                                            <div class="input-group-apppend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="col-form-label">Correo</label>
                                        <input type="text" class="form-control" id="email" readonly>
                                        <label for="banco" class="col-form-label">Entidad Bancaria</label>
                                        <input type="text" class="form-control" id="banco" readonly>
                                        <label for="celular" class="col-form-label">Tipo de Credito</label>
                                        <input type="text" class="form-control" id="tCredito" readonly>
                                        <label for="Monto" class="col-form-label">Plazo (meses)</label>
                                        <input type="text" name="plazo" class="form-control" readonly id="plazo">
                                        <label for="Monto" class="col-form-label">TCEA</label>
                                        <div class="input-group">
                                            <input type="text" name="tcea" class="form-control" readonly id="tcea">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                </div>
                                <div class="row pb-5">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction(e){
        document.getElementById("id").value=e.getAttribute("data-id")
        document.getElementById("solicitud").value=e.getAttribute("data-id_solicitud")
        document.getElementById("dni").value=e.getAttribute("data-dni")
        document.getElementById("email").value=e.getAttribute("data-email")
        document.getElementById("celular").value=e.getAttribute("data-celular")
        document.getElementById("tCredito").value=e.getAttribute("data-tCredito")
        document.getElementById("monto_ofertado").value=e.getAttribute("data-monto_ofertado")
        document.getElementById("plazo").value=e.getAttribute("data-plazo")
        document.getElementById("monto_cuota").value=e.getAttribute("data-monto_cuota")
        document.getElementById("tea").value=e.getAttribute("data-tea")
        document.getElementById("tcea").value=e.getAttribute("data-tcea")
        document.getElementById("banco").value=e.getAttribute("data-banco")
    }

    
</script>

@endsection
