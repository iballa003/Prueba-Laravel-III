@extends('layouts.app')

@section("contenido")
    <h1>Editar el piloto/a {{$piloto->nombre}}</h1>

    <form action="{{route('pilotos.update',[$piloto->id])}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$piloto->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$piloto->apellidos}}">
        </div>
        <div class="form-group">
            <label for="cargo_contacto">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$piloto->email}}">
        </div>
        <div class="form-group">
            <label for="direccion">Fecha Nacimiento</label>
            <input type="text" name="f_nacimiento" id="f_nacimiento" class="form-control" value="{{$piloto->f_nacimiento->format('d-m-Y')}}">
        </div>
        <div class="form-group">
            <label for="direccion">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" value="{{$piloto->dni}}">
        </div>
        <div class="form-group">
            <label for="direccion">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{$piloto->telefono}}">
        </div>
        @if (isset($piloto))
		<input type="hidden" name="_method" value="PUT">
	@endif
        <input type="submit" value="Actualizar piloto" class="btn btn-success">
</form>
@endsection