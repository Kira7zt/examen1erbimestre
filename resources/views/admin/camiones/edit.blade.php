
@extends('adminlte::page')
@section('content')
<div class="container">
    <h1>Editar Camion</h1>
    <form action="{{ route('admin.camiones.update', $camion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" value="{{ $camion->placa }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ $camion->modelo }}">
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" value="{{ $camion->capacidad }}">
        </div>
        <div class="form-group">
            <label for="empresa_id">Empresa</label>
            <select name="empresa_id" class="form-control">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $camion->empresa_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection