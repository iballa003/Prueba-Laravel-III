@extends('layouts.app')

@section("contenido")
    <h1>Crear un alumnos</h1>

    <form action="{{route('alumnos.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$alumno->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$alumno->apellidos??old("apellidos")}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$alumno->email??old("email")}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">Fecha nacimiento</label>
            <input type="text" name="f_nacimiento" id="f_nacimiento" class="form-control" value="{{$alumno->f_nacimiento??old("f_nacimiento")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Codigo postal</label>
            <input type="text" name="c_postal" id="c_postal" class="form-control" value="{{$alumno->c_postal??old("c_postal")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{$alumno->codigo??old("codigo")}}">
        </div>

        <input type="submit" value="Crear alumno" class="btn btn-success">
</form>
@endsection