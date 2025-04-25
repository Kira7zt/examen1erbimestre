@extends('adminlte::page')
@section('content')
<div class="container">
    <h1>Listado de Empresas</h1>
    <a href="{{ route('admin.empresas.create') }}" class="btn btn-success mb-2">Nueva Empresa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nombre }}</td>
                    <td>{{ $empresa->direccion }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>
                        <a href="{{ route('admin.empresas.edit', $empresa->id) }}" class="btn btn-success btn-sm">Editar</a>
                        <form id="form-eliminar-{{ $empresa->id }}" action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="eliminarEmpresa({{ $empresa->id }})" class="btn btn-danger btn-sm">Eliminar</button>
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
    function eliminarEmpresa(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
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
