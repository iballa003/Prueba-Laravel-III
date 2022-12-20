<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<h1>Listado de alumnos</h1>
<table id="tabla" class="table table-striped table-bordered">
	<thead>
		<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Fecha nacimiento</th><th>Codigo Postal</th></tr>
	</thead>
	<tbody>
		@foreach($alumnos as $alumno)
			<tr data-id="{{$alumno->id}}">
                <td>{{$alumno->id}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->apellidos}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{$alumno->f_nacimiento}}</td>
				<!-- <td>{{$alumno->mes}}</td>
				<td>{{$alumno->codigo}}</td> -->
                <td>{{$alumno->c_postal}}</td>
			</tr>
		@endforeach
	</tbody>	
</table>