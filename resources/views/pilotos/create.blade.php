@extends('layouts.app')

@section("contenido")
    <h1>Crear un piloto</h1>

    <form action="{{route('pilotos.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$piloto->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$piloto->apellidos??old("apellidos")}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$piloto->email??old("email")}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">Fecha nacimiento</label>
            <input type="text" name="f_nacimiento" id="f_nacimiento" class="form-control" value="{{$piloto->f_nacimiento??old("f_nacimiento")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Dni</label>
            <input type="text" name="dni" id="dni" class="form-control" value="{{$piloto->dni??old("dni")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{$piloto->telefono??old("telefono")}}">
        </div>

        <input type="submit" value="Crear piloto" class="btn btn-success">
</form>
@endsection