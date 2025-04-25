@extends('adminlte::page')
@section('content')
<div class="container">
    <h1>Registrar Camion</h1>
    <form action="{{ route('admin.camiones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control">
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" name="capacidad" class="form-control">
        </div>
        <div class="form-group">
            <label for="empresa_id">Empresa</label>
            <select name="empresa_id" class="form-control">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
