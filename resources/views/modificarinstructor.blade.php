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
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10 border">
			<form method="POST" action="/#">
				{{csrf_field()}}
				<center><h2>Modificar Instructor</h2></center>
				<br>
				<label>Nombre completo:</label>
				<input type="text" id="nombre" name="nombre" class="form-control mb-2" value="{{$instructor->nombre_completo}}">
				<label>Especialidad:</label>
				<input type="text" id="especialidad" name="especialidad" class="form-control mb-2" value="{{$instructor->especialidad}}">
				<label>Coste:</label>
				<input type="text" id="coste" name="coste" class="form-control mb-2" value="{{$instructor->coste}}">
				<hr>
				<center><h3>Teléfonos</h3></center>
				<label>Teléfonos:</label>
				@foreach(current($telefonos_array) as $tel)
				<div class="row mb-2">
					<div class="col-10">
						<input type="text" id="telefono" name="telefono" class="form-control mb-2" value="{{$tel}}">
					</div>
					<div class="col-1"></div>
					<a type="button" id="guardartelefono" href="#" class="btn btn-dark">Guardar</a>
				</div>
				@endforeach
				<label>Celulares:</label>
				@foreach(end($telefonos_array) as $cel)
				<div class="row mb-2">
					<div class="col-10">
						<input type="text" id="celular" name="celular" class="form-control mb-2" value="{{$cel}}">
					</div>
					<div class="col-1"></div>
					<a type="button" id="guardarcelular" href="#" class="btn btn-dark">Guardar</a>
				</div>
				@endforeach
				<hr>
				<label>Nuevo Telefono:</label>
				<input type="text" id="telefononuevo" name="telefononuevo" class="form-control mb-2" placeholder="14-123-12">
				<label>Celular Nuevo:</label>
				<input type="text" id="celularnuevo" name="celularnuevo" class="form-control mb-2" placeholder="451-123-32-34">
				<label>Horario:</label>
				<input type="text" id="horario" name="horario" class="form-control mb-2" value="{{$instructor->horario}}">
				<label>Sueldo Mensual:</label>
				<input type="text" id="sueldo" name="sueldo" class="form-control mb-2" value="{{$instructor->sueldo_mensual}}">
				<label>Fecha del Contrato:</label>
				<input type="date" id="fecha" name="fecha" class="form-control mb-2" value="{{$instructor->fecha_contrato}}">
				<button type="submit" class="btn btn-primary col-1 ml-5 mt-5 mb-2 float-right">Guardar</button>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>