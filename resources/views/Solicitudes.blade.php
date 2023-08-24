@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4 mt-4">

        <div class="card" id="Search" style="display: none;">
            <div class="card-header">Búsqueda de solicitudes</div>
            <div class="card-body">
            <form method="POST" action="{{ route('solicitudesPost') }}">
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
                                <input name="dni" type="number" class="form-control" placeholder="Ingrese DNI">
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
                <div class="card-header">Solicitudes</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Origen</th>
                                <th scope="col">N° Solicitud</th>
                                <th scope="col">DNI Solicitante</th>
                                <th scope="col">Nombres Solicitante</th>
                                <th scope="col">Tipo Prestamo</th>
                                <th class="col">Correo Solicitante</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($Solicitudes as $solicitud)
                            <tr>
                                <td>{{ ($Solicitudes ->currentpage()-1) * $Solicitudes ->perpage() + $loop->index + 1}}</td>
                                <td>{{ $solicitud->origen}}</td>
                                <td>{{ $solicitud->id}}</td>
                                <td>{{ $solicitud->cliente->dni}}</td>
                                <td style="max-width: 100px; min-width: 150px;">{{ strtoupper($solicitud->cliente->nombres)}}</td>
                                <td>{{ $solicitud->solicitud->descripcion }}</td>
                                <td style="max-width: 100px; min-width: 150px;">{{ $solicitud->cliente->correo}}</td>
                                <td>{{ $solicitud->cliente->celular}}</td>
                                <td style="max-width: 80px; min-width: 110px;">{{ $solicitud->created_at->todatetimestring() }}</td>
                                <td>
                                    <button onclick="myFunction(this)" type="button" class="btn btn-primary" data-dni="{{ $solicitud->cliente->dni}}" data-nombres="{{ strtoupper($solicitud->cliente->nombres)}}" data-id="{{ $solicitud->id}}" data-celular="{{ $solicitud->cliente->celular}}" data-email="{{ $solicitud->cliente->correo}}" data-tCredito="{{ $solicitud->solicitud->descripcion}}" data-ruc="{{ $solicitud->ruc}}" data-razonSocial="{{ $solicitud->razonSocial}}" data-vendedor="{{ strtoupper($solicitud->vendedor)}}" data-toggle="modal" data-target="#solicitud">
                                        Tomar
                                    </button>
                                </td>
                                @empty
                                <td colspan="10">
                                    <div class="alert alert-danger" role="alert">
                                        Lo siento, no hay solicitudes disponibles :(
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$Solicitudes->links()}}
                    <div class="modal fade" id="solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Registro de Oferta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="get" action="{{route('procesarOferta')}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="solicitudId" class="form-control" id="id" readonly>
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
                                                    <label for="tCredito" class="col-form-label">Tipo de Credito</label>
                                                    <!-- <input type="text" class="form-control" id="idtCredito">  -->
                                                    <div>
                                                        <select class="form-control" id="tCredito" name="tCredito">
                                                            <option disabled>Seleccione</option>
                                                            @foreach($parametros as $parametro)
                                                            <option value="{{$parametro->descripcion}}"> {{$parametro->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                                        <input type="number" step="any" name="monto_ofertado" maxlength="9" required class="form-control" id="monto_ofertado">
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
                                                        <input type="number" step="any" maxlength="12" name="monto_cuota" required class="form-control" id="monto_cuota">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Monto" class="col-form-label">Plazo (meses)</label>
                                                    <input type="number" step="any" maxlength="3" name="plazo" required class="form-control" id="plazo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="Monto" class="col-form-label">TCEA</label>
                                                    <div class="input-group">
                                                        <input type="number" step="any" maxlength="6" name="tcea" required class="form-control" id="tcea">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Monto" class="col-form-label">TEA</label>
                                                    <div class="input-group">
                                                        <input type="number" step="any" maxlength="6" name="tea" required class="form-control" id="tea">
                                                        <div class="input-group-apppend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="calificacion" class="col-form-label">Calificación</label>
                                                    <select class="custom-select" name="calificacion" id="calificacion">
                                                        <option disabled>Seleccione</option>
                                                        <option value="1">Denegado</option>
                                                        <option selected value="2">Aprobado</option>
                                                        <option value="3">Preaprobado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Mensaje:</label>
                                                        <textarea class="form-control" name="mensaje" rows="5" id="message-text"></textarea>
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
                                            <div class="row pb-5">
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>
                                                </div>

                                                @if(auth()->user()->rol !== 'Administrador')
                                                <div class="col-md-6">
                                                    <button id="enviar" class="btn btn-default btn-success btn-block" type="submit">Enviar</button>
                                                    <button hidden id="Henviar" type="submit" name="submit" value="Submit">Enviar</button>
                                                </div>
                                                @endif

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
    <script>
        $(document).ready(function() {
            //Inputmask({"mask": "999[.99]"}).mask("#tea");
            //Inputmask({"mask": "999[.99]"}).mask("#tcea");
            $("#enviar").click(function(event) {
                event.preventDefault();
                try {
                    validarCampos();
                    bootbox.confirm({
                        message: "¿Esta seguro que desea procesar la solicitud, con monto ofertado S./" + $("#monto_ofertado").val() + " ,con calificación " + $("#calificacion option:selected").text() + " y tipo de credito" + $("#tCredito option:selected").text() + " ?",
                        buttons: {
                            confirm: {
                                label: 'Si',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function(result) {
                            if (result) {
                                $("#Henviar").click();
                            }
                        }
                    });
                } catch (err) {
                    bootbox.alert(err)
                }
            })
        })
        function validarCampos() {
            if ($("#monto_ofertado").val().length == 0) {
                throw "Debe ingresar el monto oferta"
            }
            if ($("#monto_cuota").val().length == 0) {
                throw "Debe ingresar el monto de la cuota"
            }
            if ($("#plazo").val().length == 0) {
                throw "Debe ingresar el plazo"
            }
            if ($("#tcea").val().length == 0) {
                throw "Debe ingresar el TCEA"
            }
            if ($("#tea").val().length == 0) {
                throw "Debe ingresar el TEA"
            }
        }
        function myFunction(e) {
            document.getElementById("id").value = e.getAttribute("data-id")
            document.getElementById("dni").value = e.getAttribute("data-dni")
            document.getElementById("nombres").value = e.getAttribute("data-nombres")
            document.getElementById("email").value = e.getAttribute("data-email")
            document.getElementById("celular").value = e.getAttribute("data-celular")
            document.getElementById("tCredito").value = e.getAttribute("data-tCredito")
            if (e.getAttribute("data-ruc")) {
                $("#ferreteriaDiv").prop("hidden", false)
                $("#ferreteria").val("Ruc: " + e.getAttribute("data-ruc") + "\n" + "DNI: " + "" + e.getAttribute("data-razonSocial") + "\n" + "Vendedor: " + e.getAttribute("data-vendedor"))
            } else {
                $("#ferreteriaDiv").prop("hidden", true)
            }
        }
    </script>
    @endsection