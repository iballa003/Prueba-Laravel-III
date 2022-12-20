@extends('layouts.app')
@section("contenido")
<h1>Libros</h1>
<a href="{{route('libros.create')}}" class="btn btn-success mb-3">Crear libro</a>
<a href="{{route('libros.pdf')}}" class="btn btn-warning mb-3">Generar PDF</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Nº paginas</th>
                    <th>Genero</th>
                    <th>Fecha publicacion</th>
                    <th>Codigo</th>
                    <th>Mes</th>
                    <th></th>
                    <th></th>
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
                <td>{{$libro->codigo}}</td>
                <td>{{$libro->mes}}</td>
                <td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
                <td><a href='{{url("libros/$libro->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
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
                        url: "{{url('/libros')}}/"+id,
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