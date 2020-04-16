<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<title>Gymentry</title>
	<!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<!-- Styles -->
</head>
<body>
	<br>
	<br>
	<center><h3>Listado de instructores</h3></center>
	<br>
	<br>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<input type="text" class="form-control mb-3" name="buscador" id="idbuscador" placeholder="buscador">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">NOMBRE</th>
						<th scope="col">ESPECIALIDAD</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody id="idbody">
					@foreach($instructores as $inst)
					<tr>
						<td>{{$inst->_id}}</td>
						<td>{{$inst->nombre_completo}}</td>
						<td>{{$inst->especialidad}}</td>
						<td><a type="button" class="btn btn-dark btn-block" href="/instructorseleccionado/{{$inst->_id}}">editar</a></td>
						<td><a type="button" class="btn btn-dark btn-block" href="/eliminarinstructor/{{$inst->id}}">eliminar</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#idbuscador').on("keyup", function(){
			var value = $(this).val().toLowerCase();
			$("#idbody tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
</html>