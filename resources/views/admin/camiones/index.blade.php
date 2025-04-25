@extends('adminlte::page')
@section('content')
<div class="container">
    <h1>Listado de Camiones</h1>
    <a href="{{ route('admin.camiones.create') }}" class="btn btn-success mb-2">Nuevo Camion</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Capacidad(Toneladas)</th>
                <th>Empresa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($camiones as $camion)
                <tr>
                    <td>{{ $camion->placa }}</td>
                    <td>{{ $camion->modelo }}</td>
                    <td>{{ $camion->capacidad }}</td>
                    <td>{{ $camion->empresa->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.camiones.edit', $camion->id) }}" class="btn btn-success btn-sm">Editar</a>
                        <form id="form-eliminar-{{ $camion->id }}" action="{{ route('admin.camiones.destroy', $camion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="eliminarCamion({{ $camion->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


@section('js')
<script>
    function eliminarCamion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás deshacer esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-eliminar-' + id).submit();
            }
        });
    }

    @if(session('mensaje') && session('icono') == 'success')
    Swal.fire({
        icon: 'success',
        title: '{{ session("mensaje") }}',
        showConfirmButton: false,
        timer: 2000
    });
    @endif
</script>
@endsection
