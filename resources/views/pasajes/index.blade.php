@extends('layouts.app1')
@section("contenido")
<h1>Pasajes</h1>
<a href="{{route('pasajes.create')}}" class="btn btn-success mb-3">Crear Pasaje</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Precio</th>
                    <th>Vuelo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pasajes as $pasaje)
            <tr data-id='{{$pasaje->id}}'>
                <td>{{$pasaje->id}}</td>
                <td>{{$pasaje->nombre}}</td>
                <td>{{$pasaje->apellidos}}</td>
                <td>{{$pasaje->precio}}</td>
                <td>{{$pasaje->vuelo->destino}}</td>
                <td class="icon"><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
                <td class="icon"><a href='{{url("pasajes/$pasaje->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
                <td class="icon"><a href='{{url("pasajes/sumar/$pasaje->id")}}'><img width="32px" class="btn_add" src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/add_green.png"></a></td>
                <td class="icon"><a href='{{url("pasajes/restar/$pasaje->id")}}'><img width="32px" src="https://cdn-icons-png.flaticon.com/512/929/929430.png"></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script>
        $(document).ready(function(){
        $('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		    });

            // $("#tabla").on("click",".btn_add",function(e){
            //     const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
            //     const id=tr.data("id"); //obtener el id del tr
            //     $.ajax({
            //             url: "{{url('/pasajes/sumar')}}/"+id,
            //             method: "GET",
            //             success: function(){
            //                 return "0k";
            //             }
            //         })
            // });

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
                        url: "{{url('/pasajes')}}/"+id,
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