@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                <div class="pb-3">
                    <a href="{{ route('formularioRegistro') }}" type="button" class="btn btn-success">Registrar Nuevo</a>
                </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Banco</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userList as $user)
                            <tr>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->dni }}</td>
                                <td>{{ $user->banco->nombre}}</td>
                                <td>
                                    <a href=" {{ route('formularioActualizacion', $user->id)}}" class="btn btn-warning text-dark">Actualizar</a>
                                </td>
                            @empty
                                <td colspan="5">
                                    <div class="alert alert-danger" role="alert">
                                        Lo siento, no hay Usuarios disponibles :(
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$userList->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
