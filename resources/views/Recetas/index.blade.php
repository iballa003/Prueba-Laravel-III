@extends('layouts.app')
@section("contenido")
<h1>Recetas</h1>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>F_nacimiento</th>
                    <th>Codigo Postal</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($alumnos as $alumno)
            <tr data-id='{{$alumno->id}}'>
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->apellidos}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{ \Carbon\Carbon::parse($alumno->f_nacimiento)->format('d/m/Y')}}</td>
                <td>{{$alumno->c_postal}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script>
            $(document).ready(function(){
        $('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		    });
        });
        </script>
@endsection