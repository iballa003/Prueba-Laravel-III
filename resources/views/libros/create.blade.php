@extends('layouts.app')

@section("contenido")
    <h1>Crear un libro</h1>

    <form action="{{route('libros.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="empresa">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{$libro->titulo??old("titulo")}}">
        </div>
        <div class="form-group">
            <label for="contacto">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{$libro->autor??old("autor")}}">
        </div>
        <div class="form-group">
            <label for="paginas">Nº paginas</label>
            <input type="text" name="paginas" id="paginas" class="form-control" value="{{$libro->paginas??old("paginas")}}">
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <input type="text" name="genero" id="genero" class="form-control" value="{{$libro->genero??old("genero")}}">
        </div>
        <div class="form-group">
            <label for="f_publicacion">Fecha publicacion</label>
            <input type="text" name="f_publicacion" id="f_publicacion" class="form-control" value="{{$libro->f_publicacion??old("f_publicacion")}}">
        </div>
        <div class="form-group">
            <label for="direccion">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{$alumno->codigo??old("codigo")}}">
        </div>
        <input type="submit" value="Crear libro" class="btn btn-success">
</form>
@endsection