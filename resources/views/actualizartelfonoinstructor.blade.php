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
	<div class="row mt-5">
		<div class="col-1"></div>
		<div class="col-10 border">
			<center><h3>Modificar</h3></center>
			<br>
			<form method="POST" action="{{url("/telefonocambiado/?id=$id&numero=$numero&tipo=$tipo")}}">
				{{csrf_field()}}
				<label>Cambiar el número seleccionado (si se requiere eliminar solo borre el número del campo y guarde los cambios):</label>
				<input type="text" id="numerocambiar" name="numerocambiar" class="form-control mb-2" value="{{$numero}}">
				<div class="row">
					<div class="col-10"></div>
					<button type="submit" class="btn col-1 btn-dark mb-2 ml-5">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>