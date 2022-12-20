@extends('layouts.app')

@section("contenido")
    <h1>Editar un alumnos</h1>

    <form action="{{route('alumnos.update',[$alumno->id])}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$alumno->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$alumno->apellidos}}">
        </div>
        <div class="form-group">
            <label for="cargo_contacto">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$alumno->email}}">
        </div>
        <div class="form-group">
            <label for="direccion">Fecha nacimiento</label>
            <input type="text" name="f_nacimiento" id="f_nacimiento" class="form-control" value="{{$alumno->f_nacimiento->format('d-m-Y')}}">
        </div>
        <div class="form-group">
            <label for="direccion">Codigo postal</label>
            <input type="text" name="c_postal" id="c_postal" class="form-control" value="{{$alumno->c_postal}}">
        </div>
        @if (isset($alumno))
		<input type="hidden" name="_method" value="PUT">
	@endif
        <input type="submit" value="Actualizar alumno" class="btn btn-success">
</form>
@endsection