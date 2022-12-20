@extends('layouts.app1')
@section("contenido")
<h1>Numero de vuelos del piloto/a {{$piloto->nombre}}</h1>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>id</th>
                    <th>codigo</th>
                    <th>origen</th>
                    <th>destino</th>
                    <th>fecha</th>
                    <th>hora</th>
                    <th>Piloto</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($vuelos as $vuelo)
            <tr data-id='{{$vuelo->id}}'>
                <td>{{$vuelo->id}}</td>
                <td>{{$vuelo->codigo}}</td>
                <td>{{$vuelo->origen}}</td>
                <td>{{$vuelo->destino}}</td>
                <td>{{$vuelo->fecha->format('d-m-Y')}}</td>
                <td>{{$vuelo->hora}}</td>
                <td>{{$piloto->nombre}} {{$piloto->apellidos}}</td>
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