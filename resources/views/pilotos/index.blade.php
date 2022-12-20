@extends('layouts.app1')
@section("contenido")
<h1>Pilotos</h1>
<a href="{{route('pilotos.create')}}" class="btn btn-success mb-3">Crear piloto</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th class="no-sort">Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th class="no-sort">Email</th>
                    <th class="no-sort">Fecha nacimiento</th>
                    <th class="no-sort">Dni</th>
                    <th class="no-sort">Telefono</th>
                    <th class="no-sort">Nº vuelos</th>
                    <th class="no-sort">Edad</th>
                    <th class="no-sort"></th>
                    <th class="no-sort"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pilotos as $piloto)
            <tr data-id='{{$piloto->id}}'>
                <td>{{$piloto->id}}</td>
                <td>{{$piloto->nombre}}</td>
                <td>{{$piloto->apellidos}}</td>
                <td>{{$piloto->email}}</td>
                <td>{{ $piloto->f_nacimiento->format('d/m/Y')}}</td>
                <td>{{$piloto->dni}}</td>
                <td>{{$piloto->telefono}}</td>
                @if ($piloto->vuelos->count() != 0)
                <td><a href='{{url("pilotos/vuelos/$piloto->id")}}'>{{$piloto->vuelos->count()}}</a></td>
                @else
                <td>{{$piloto->vuelos->count()}}</td>
                @endif
                <td>{{$piloto->edad}}</td>
                <!-- <td><a href='{{url("pilotos/vuelos/$piloto->id")}}'>{{$piloto->vuelos->count()}}</a></td> -->
                <td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
                <td><a href='{{url("pilotos/$piloto->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
        <script>
            $(document).ready(function(){
        $('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
            orderable: false,
            columnDefs: [{
            orderable: false,
            targets: "no-sort"
            }]
		    });

            $("#tabla").on("click",".btn_borrar",function(e){
                e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //redireccionar a la url
                    //borrar con ajax
                    const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
                    const id=tr.data("id"); //obtener el id del tr
                    $.ajax({
                        url: "{{url('/pilotos')}}/"+id,
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    })
                }
            })    
        });

        });
        </script>
@endsection