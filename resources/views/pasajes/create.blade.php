@extends('layouts.app')

@section("contenido")
    <h1>Crear un pasaje</h1>

    <form action="{{route('pasajes.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$pasaje->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$pasaje->apellidos??old("apellidos")}}">
        </div>
        <div class="form-group">
            <label for="email">Vuelo</label>
            <input type="text" name="vuelo_id" id="vuelo_id" class="form-control" value="{{$pasaje->vuelo_id??old("vuelo_id")}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{$pasaje->precio??old("precio")}}">
        </div>
        <input type="submit" value="Crear pasaje" class="btn btn-success">
</form>
@endsection