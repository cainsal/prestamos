@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4 mt-4">
        <div class="card" id="Search">
            <div class="card-header">Búsqueda de ofertas</div>
            <div class="card-body">
            <form method="POST" action="{{ route('ofertasPost') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Origen</label><br />
                                <select name="origen_s" class="form-control">
                                    <option value=null>Todos</option>
                                    <option value="MiYunta">MiYunta</option>
                                    <option value="TuCasa">TuCasa</option>
                                    <option value="Comercio">Comercio</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">DNI</label><br />
                                <input type="number" name="dni" class="form-control" placeholder="Ingrese DNI">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tipo Credito</label><br />
                                <select class="form-control" id="tCredito_S" name="tCredito_S">
                                    <option value=null>Todos</option>
                                    @foreach($parametros as $parametro)
                                    <option value="{{$parametro->id}}"> {{$parametro->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Estado</label><br />
                                <select name="estado_s" class="form-control">
                                    <option value=null>Todos</option>
                                    <option value="1">Ofertado</option>
                                    <option value="2">Aceptado</option>
                                    <option value="3">Rechazado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Desde</label><br />
                                <input type="date" class="form-control" name="Desde">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Hasta</label><br />
                                <input type="date" class="form-control" name="Hasta">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4 mb-0">
                        <button class="btn btn-info text-white">
                            <i class="fa fa-search"></i>
                            <span class="ml-2">Buscar</span>
                        </button>
                    </div>
            </div>
            </form>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ofertas</div>
                <div class="card-body">
                    <table class="table" style="background: white;">
                        <thead class="thead-dark">
                            <tr>
                                @if(auth()->user()->rol === 'Administrador')
                                <th scope="col">Agente</th>
                                <th scope="col">Banco</th>
                                @endif
                                <th scope="col">N° Solicitud</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Tipo Prestamo</th>
                                <th scope="col">DNI Solicitante</th>
                                <th scope="col">Nombres Solicitante</th>
                                <th scope="col">Monto Ofertado</th>
                                <th scope="col">Calificación</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cierre</th>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Ofertas as $oferta)
                            <tr>
                                @if(auth()->user()->rol === 'Administrador')
                                <td>{{ $oferta->agente->name}}</td>
                                <td>{{ $oferta->agente->banco->nombre}}</td>
                                @endif
                                <td style="max-width: 50px; min-width: 50px;">{{ $oferta->solicitud->id}}</td>
                                <td style="max-width: 80px; min-width: 50px;">{{ $oferta->solicitud->origen}}</td>
                                <!-- <td style="max-width: 100px; min-width: 115px;">{{ $oferta->solicitud->solicitud->descripcion}}</td> -->
                                <td style="max-width: 100px; min-width: 115px;">{{$oferta->prestamo->descripcion}}</td>
                                <td style="max-width: 80px; min-width: 100px;">{{ $oferta->solicitud->cliente->dni}}</td>
                                <td style="max-width: 100px; min-width: 150px;">{{ strtoupper($oferta->solicitud->cliente->nombres)}}</td>
                                <td style="max-width: 250px; min-width: 110px;">S/. {{number_format($oferta->monto_ofertado, 2) }}</td>
                                <td style="max-width: 100px; min-width: 50px;">
                                    @if($oferta->calificacion == 1)
                                    <span class="badge badge-warning p-2">Denegado</span>
                                    @elseif ($oferta->calificacion == 2)
                                    <span class="badge badge-success p-2">Aprobado</span>
                                    @elseif ($oferta->calificacion == 3)
                                    <span class="badge badge-danger p-2">Preaprobado</span>
                                    @endif
                                </td>
                                <td style="max-width: 100px; min-width: 50px;">
                                    @if($oferta->estado === 1)
                                    <span class="badge badge-warning p-2">Ofertado</span>
                                    @elseif ($oferta->estado === 2)
                                    <span class="badge badge-success p-2">Aceptado</span>
                                    @else
                                    <span class="badge badge-danger p-2">Rechazada</span>
                                    @endif
                                </td>
                                <td style="max-width: 100px; min-width: 50px;">
                                    @if($oferta->estadoCierre === 1)
                                    <span class="badge badge-success p-2">Desembolsado</span>
                                    @elseif ($oferta->estadoCierre == 2)
                                    <span class="badge badge-danger p-2">Rechazado</span>
                                    @else
                                    @if($oferta->estado === 2)
                                    <form method="POST" action="{{route('cerrarSolicitud')}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="ofertaSolicitudId" value="{{ $oferta->id }}">

                                        @if(auth()->user()->rol === 'Bancario')
                                        <button title="Rechazado" id="rechazado" name="estadoCierre" value="2" class="btn btn-default btn-danger" type="submit">R</button>
                                        <button title="Desembolsado" id="desembolsado" name="estadoCierre" value="1" class="btn btn-default btn-success" type="submit">D</button>
                                        @else
                                        <span class="badge badge-danger p-2">Pendiente</span>
                                        @endif
                                    </form>
                                    @else
                                    <span class="badge badge-danger p-2">Pendiente</span>
                                    @endif
                                    @endif
                                </td>
                                <td style="max-width: 100px; min-width: 110px;">{{ $oferta->updated_at->todatetimestring() }}</td>

                                <td >
                                <button onclick="myFunction(this)" type="button" class="btn btn-primary" 
                                            data-dni="{{ $oferta->solicitud->cliente->dni}}"
                                            data-nombres="{{ strtoupper($oferta->solicitud->cliente->nombres)}}"
                                            data-celular="{{ $oferta->solicitud->cliente->celular}}" 
                                            data-email="{{ $oferta->solicitud->cliente->correo}}" 
                                            data-tCredito="{{ $oferta->prestamo->descripcion}}" 
                                            data-monto_ofertado="{{ number_format($oferta->monto_ofertado, 2)}}" 
                                            data-mensaje="{{ $oferta->mensaje}}"
                                            data-plazo="{{ $oferta->plazo}}"
                                            data-monto_cuota="{{ number_format($oferta->monto_cuota, 2)}}"
                                            data-tea="{{ $oferta->TEA}}"
                                            data-tcea="{{ $oferta->TCEA}}"
                                            data-ruc="{{ $oferta->ruc}}"
                                            data-razonSocial="{{ $oferta->razonSocial}}"
                                            data-vendedor="{{ strtoupper($oferta->vendedor)}}"
                                            data-toggle="modal" 
                                            data-target="#oferta">
                                            Detalles
                                </button>

                                </td>
                                @empty
                                <td colspan="12">
                                    <div class="alert alert-danger" role="alert">
                                        Lo siento, no hay ofertas disponibles :(
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$Ofertas->links()}}
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="ofertaSolicitudId" class="form-control" id="id" readonly>
                                                <label for="dni" class="col-form-label">DNI Solicitante</label>
                                                <input type="text" class="form-control" id="dni" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nombres" class="col-form-label">Nombres Solicitante</label>
                                                <input type="text" class="form-control" id="nombres" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email" class="col-form-label">Correo Solicitante</label>
                                                <input type="text" class="form-control" id="email" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="celular" class="col-form-label">Tipo de Credito</label>
                                                <input type="text" class="form-control" id="tCredito" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="celular" class="col-form-label">Celular Solicitante</label>
                                                <input type="text" class="form-control" id="celular" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Monto" class="col-form-label">Monto Oferta</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">S/</span>
                                                    </div>
                                                    <input type="text" name="monto_ofertado" readonly required class="form-control" id="monto_ofertado">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Monto" class="col-form-label">Monto Cuota</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">S/</span>
                                                    </div>
                                                    <input type="text" name="monto_cuota" required class="form-control" id="monto_cuota" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Monto" class="col-form-label">Plazo (meses)</label>
                                                <input type="text" name="plazo" required class="form-control" id="plazo" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Monto" class="col-form-label">TCEA</label>
                                                <div class="input-group">
                                                    <input type="text" maxlength="2" name="tcea" required class="form-control" id="tcea" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Monto" class="col-form-label">TEA</label>
                                                <div class="input-group">
                                                    <input type="text" maxlength="2" name="tea" required class="form-control" id="tea" readonly>
                                                    <div class="input-group-apppend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Mensaje:</label>
                                                    <textarea class="form-control" required name="mensaje" rows="5" id="mensaje" readonly></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="ferreteriaDiv" hidden>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Ferreteria:</label>
                                                    <textarea class="form-control" rows="5" id="ferreteria" readonly></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-5">
                                        <div class="col-md-6">
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
    function myFunction(e) {
        document.getElementById("dni").value = e.getAttribute("data-dni")
        document.getElementById("nombres").value = e.getAttribute("data-nombres")
        document.getElementById("email").value = e.getAttribute("data-email")
        document.getElementById("celular").value = e.getAttribute("data-celular")
        document.getElementById("tCredito").value = e.getAttribute("data-tCredito")
        document.getElementById("monto_ofertado").value = e.getAttribute("data-monto_ofertado")
        document.getElementById("mensaje").value = e.getAttribute("data-mensaje")
        document.getElementById("plazo").value = e.getAttribute("data-plazo")
        document.getElementById("monto_cuota").value = e.getAttribute("data-monto_cuota")
        document.getElementById("tea").value = e.getAttribute("data-tea")
        document.getElementById("tcea").value = e.getAttribute("data-tcea")
        //document.getElementById("estadoCierre").value=e.getAttribute("data-estadoCierre")!=null?e.getAttribute("data-estadoCierre"):""

        if (e.getAttribute("data-ruc")) {

            $("#ferreteriaDiv").prop("hidden", false)
            $("#ferreteria").val("Ruc: " + e.getAttribute("data-ruc") + "\n" + "DNI: " + "" + e.getAttribute("data-razonSocial") + "\n" + "Vendedor: " + e.getAttribute("data-vendedor"))
        } else {

            $("#ferreteriaDiv").prop("hidden", true)
        }

        /*document.getElementById("ruc").value=e.getAttribute("data-ruc")!=null?e.getAttribute("data-ruc"):""
        document.getElementById("razonSocial").value=e.getAttribute("data-razonSocial")!=null?e.getAttribute("data-razonSocial"):""
        document.getElementById("vendedor").value=e.getAttribute("data-vendedor")!=null?e.getAttribute("data-vendedor"):""*/
    }
</script>
@endsection