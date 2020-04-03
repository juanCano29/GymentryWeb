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
			<br>
			<center><h2>Actualizar Dirección</h2></center>
			<br>
			<form method="POST" action="{{url("/actualizardir")}}">
				<label>Colonia:</label>
				<input type="text" class="form-control mb-2" name="colonia" id="colonia" value="{{$colonia}}" required>
				<label>Calle:</label>
				<input type="text" class="form-control mb-2" name="calle" id="calle" value="{{$calle}}" required>
				<label>Número:</label>
				<input type="text" class="form-control mb-2" name="numero" id="numero" value="{{$numero}}" required>
				<div class="row">
					<div class="col-11"></div>
					<button type="submit" class="btn btn-info mb-2">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>