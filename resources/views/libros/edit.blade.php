@extends('layouts.app')

@section("contenido")
    <h1>Editar libro</h1>

    <form action="{{route('libros.update',[$libro->id])}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{$libro->titulo??old("titulo")}}">
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{$libro->autor}}">
        </div>
        <div class="form-group">
            <label for="paginas">Nº paginas</label>
            <input type="text" name="paginas" id="paginas" class="form-control" value="{{$libro->paginas}}">
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <input type="text" name="genero" id="genero" class="form-control" value="{{$libro->genero}}">
        </div>
        <div class="form-group">
            <label for="direccion">Fecha publicacion</label>
            <input type="text" name="f_publicacion" id="f_publicacion" class="form-control" value="{{$libro->f_publicacion->format('d-m-Y')}}">
        </div>
        @if (isset($libro))
		<input type="hidden" name="_method" value="PUT">
	@endif
        <input type="submit" value="Actualizar libro" class="btn btn-success">
</form>
@endsection