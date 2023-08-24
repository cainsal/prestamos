@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Usuario</div>
                <div class="card-body">
                <form method="post" action="{{route('actualizarUsuario')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}" placeholder="Ingrese el Nombre Completo">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" aria-describedby="emailHelp" placeholder="Ingrese el Correo">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ $usuario->dni }}" placeholder="Ingrese el DNI">
                        @error('dni')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banco">Banco</label>
                        <select class="form-control" id="banco" name="banco">
                            @foreach ($bancos as $banco)
                                <option value="{{ $banco->id }}" {{ $usuario->id_banco === $banco->id ? 'selected' : ''  }}>{{ $banco->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dni">Password</label>
                        <input type="password" class="form-control" id="passwordUp" name="passwordUp" value="{{ $usuario->passwordUp }}" placeholder="Ingrese el password">
                        <!--@error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->
                    </div>
                    <a href="{{ route('listadoUsuarios') }}" type="button" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Registro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
