@extends('layouts.app')

@section("contenido")
    <h1>Crear un vuelo</h1>

    <form action="{{route('vuelos.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{$vuelo->codigo??old("codigo")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Origen</label>
            <input type="text" name="origen" id="origen" class="form-control" value="{{$vuelo->origen??old("origen")}}">
        </div>
        <div class="form-group">
            <label for="email">Destino</label>
            <input type="text" name="destino" id="destino" class="form-control" value="{{$vuelo->destino??old("destino")}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control" value="{{$vuelo->fecha??old("fecha")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Hora</label>
            <input type="text" name="hora" id="hora" class="form-control" value="{{$vuelo->hora??old("hora")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Piloto</label>
            <input type="text" name="piloto_id" id="piloto_id" class="form-control" value="{{$vuelo->piloto_id??old("piloto_id")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Matricula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" value="{{$vuelo->matricula??old("matricula")}}">
        </div>

        <input type="submit" value="Crear piloto" class="btn btn-success">
</form>
@endsection