@extends('layouts.app')
@section("contenido")
<h1>Alumnos</h1>
<a href="{{route('alumnos.create')}}" class="btn btn-success mb-3">Crear alumno</a>
<a href="{{route('alumnos.pdf')}}" class="btn btn-warning mb-3">Generar PDF</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Fecha nacimiento</th>
                    <th>Codigo Postal</th>
                    <th>Codigo</th>
                    <th>Mes</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($alumnos as $alumno)
            <tr data-id='{{$alumno->id}}'>
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->apellidos}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{ $alumno->f_nacimiento->format('d/m/Y')}}</td>
                <td>{{$alumno->c_postal}}</td>
                <td>{{$alumno->codigo}}</td>
                <td>{{$alumno->mes}}</td>
                <td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
                <td><a href='{{url("alumnos/$alumno->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
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
                        url: "{{url('/alumnos')}}/"+id,
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