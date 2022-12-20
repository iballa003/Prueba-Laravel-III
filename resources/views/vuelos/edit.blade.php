@extends('layouts.app')

@section("contenido")
    <h1>Editar un vuelos</h1>

    <form action="{{route('vuelos.update',[$vuelo->id])}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{$vuelo->codigo??old("codigo")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Origen</label>
            <input type="text" name="origen" id="origen" class="form-control" value="{{$vuelo->origen}}">
        </div>
        <div class="form-group">
            <label for="cargo_contacto">Destino</label>
            <input type="text" name="destino" id="destino" class="form-control" value="{{$vuelo->destino}}">
        </div>
        <div class="form-group">
            <label for="direccion">Fecha</label>
            <input type="text" name="fecha" id="fecha" class="form-control" value="{{$vuelo->fecha->format('d-m-Y')}}">
        </div>
        <div class="form-group">
            <label for="direccion">Hora</label>
            <input type="text" name="hora" id="hora" class="form-control" value="{{$vuelo->hora}}">
        </div>
        <div class="form-group">
            <label for="direccion">Piloto</label>
            <select class="form-control" name="piloto_id">
            @foreach ($pilotos as $piloto)
            <option value="{{ $piloto->id }}" {{ ( $piloto->id == $vuelo->piloto->id) ? 'selected' : '' }}> {{$piloto->nombre}} {{$piloto->apellidos}} </option>
            @endforeach
            </select>
            <!-- <input type="text" name="piloto_id" id="piloto_id" class="form-control" value="{{$vuelo->piloto_id??old("piloto_id")}}"> -->
        </div>
        <div class="form-group">
            <label for="direccion">Matricula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" value="{{$vuelo->matricula??old("matricula")}}">
        </div>
        @if (isset($vuelo))
		<input type="hidden" name="_method" value="PUT">
	@endif
        <input type="submit" value="Actualizar vuelo" class="btn btn-success">
</form>
@endsection