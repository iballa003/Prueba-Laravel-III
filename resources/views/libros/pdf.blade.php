<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<h1>Listado de libros</h1>

<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Nº paginas</th>
                    <th>Genero</th>
                    <th>Fecha publicacion</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($libros as $libro)
            <tr data-id='{{$libro->id}}'>
                <td>{{$libro->id}}</td>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->autor}}</td>
                <td>{{$libro->paginas}}</td>
                <td>{{$libro->genero}}</td>
                <td>{{$libro->f_publicacion->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>