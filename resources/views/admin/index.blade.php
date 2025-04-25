@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <a href="{{ route('admin.empresas.index') }}">

              <img src="{{ url('/img/edificio.gif') }}" width="70px" alt="">
              <div class="info-box-content">
                <span class="info-box-text"><b>Empresas registradas</b></span>
                <span class="info-box-number">{{ $total_empresas }} empresa/s</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <a href="{{ route('admin.camiones.index') }}">

              <img src="{{ url('/img/camion.gif') }}" width="70px" alt="">
              <div class="info-box-content">
                <span class="info-box-text"><b>Camiones registrados</b></span>
                <span class="info-box-number">{{ $total_camiones }} camion/es</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop