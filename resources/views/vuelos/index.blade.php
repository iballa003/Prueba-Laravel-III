@extends('layouts.app1')
@section("contenido")
<h1>Vuelos</h1>
<a href="{{route('vuelos.create')}}" class="btn btn-success mb-3">Crear vuelo</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>id</th>
                    <th>Codigo</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Piloto</th>
                    <th>Matricula</th>
                    <th></th>
                    <th></th>
                    <th></th>
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
                <td>{{$vuelo->piloto->nombre}}</td>
                <td>{{$vuelo->matricula}}</td>
                <td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
                <td><a href='{{url("vuelos/$vuelo->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
                <td><a href='{{url("vuelos/$vuelo->id")}}'><img class='btn_editar' width="32px" src="https://icons.veryicon.com/png/o/education-technology/educational-icon/read-13.png"></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script>
        $(document).ready(function(){
        $('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
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
                        url: "{{url('/vuelos')}}/"+id,
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