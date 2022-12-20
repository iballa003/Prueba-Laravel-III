@extends('layouts.app')
@section("contenido")
<h1>Usuarios</h1>
<a href='{{url("usuarios/restore")}}' class="btn btn-success mb-3">Restaurar</a>
<a id="borrar" href='{{url("usuarios/borrardefinitivo")}}' class="btn btn-success mb-3">Borrar definitivo</a>
<table id="tabla" class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha nacimiento</th>
                    <th>Edad</th>
                    <th>Nº publicaciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
            <tr data-id='{{$usuario->id}}'>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellidos}}</td>
                <td>{{$usuario->f_nacimiento->format('d/m/Y')}}</td>
                <td>{{$usuario->edad}}</td>
                <td><a class='btn_modal' href='#'>{{$usuario->publicaciones->count()}}</a></td>
                <td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
            </tr>
            @endforeach
        </tbody>
        </table>


        <div id="openModal" class="modalDialog">
            <div>
                <a href="#close" title="Close" class="close">X</a>
                <h2 id="titulo-modal">Mi modal</h2>
                <p>Este es un ejemplo de modal, creado gracias al poder de CSS3.</p>
                <p>Puedes hacer un montón de cosas aquí, como alertas o incluso crear un formulario de registro aquí mismo.</p>
            </div>
        </div>

        <script>
            $(document).ready(function(){
        $('#tabla').DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		    });

            $("#tabla").on("click",".btn_modal",function(e){
                e.preventDefault();
                const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
                const id=tr.data("id"); //obtener el id del tr
                
            });

            $("#tabla").on("click",".btn_borrar",function(e){
            e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Puedes revertirlo pulsando el botón restaurar.",
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
                        url: "{{url('/usuarios')}}/"+id,
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

        $(document).on("click","#borrar",function(e){
            e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Esto no se puede revertir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //redireccionar a la url
                    //borrar con ajax
                    $.ajax({
                        url: "{{url('/usuarios/borrardefinitivo')}}/",
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            return 'ok';
                        }
                    })
                }
            })    
        });

        });
        </script>
@endsection