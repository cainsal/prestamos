@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registro de Usuario</div>
                <div class="card-body">
                <form method="post" action="{{route('registrarUsuario')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el Nombre completo">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese el Correo">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI">
                        @error('dni')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banco">Banco</label>
                        <select class="form-control" id="banco" name="banco">
                            @foreach ($bancos as $banco)
                                <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('listadoUsuarios') }}" type="button" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Enviar Registro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
