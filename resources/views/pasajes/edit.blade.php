@extends('layouts.app')

@section("contenido")
    <h1>Editar el pasaje</h1>

    <form action="{{route('pasajes.update',[$pasaje->id])}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$pasaje->nombre??old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$pasaje->apellidos}}">
        </div>
        <!-- <div class="form-group">
            <label for="cargo_contacto">Vuelo</label>
            <input type="text" name="vuelo_id" id="vuelo_id" class="form-control" value="{{$pasaje->vuelo_id}}">
        </div> -->
        <div class="form-group">
            <label for="direccion">Vuelo</label>
            <select class="form-control" name="vuelo_id">
            @foreach ($vuelos as $vuelo)
            <option value="{{ $vuelo->id }}" {{ ( $vuelo->id == $pasaje->vuelo->id) ? 'selected' : '' }}> {{$vuelo->origen}} - {{$vuelo->destino}} </option>
            @endforeach
            </select>
            <!-- <input type="text" name="piloto_id" id="piloto_id" class="form-control" value="{{$vuelo->piloto_id??old("piloto_id")}}"> -->
        </div>
        <div class="form-group">
            <label for="direccion">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{$pasaje->precio}}">
        </div>
        @if (isset($pasaje))
		<input type="hidden" name="_method" value="PUT">
	@endif
        <input type="submit" value="Actualizar pasaje" class="btn btn-success">
</form>
@endsection