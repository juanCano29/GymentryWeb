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
			<center><h2>Actualizar Teléfonos</h2></center>
			<br>
			<form method="POST" action="{{url("/actualizartelf/?id=$id&numero=$numero")}}">
				{{csrf_field()}}
				<label>Doméstico:</label>
				<input type="text" class="form-control mb-2" name="telefono" id="telefono" value="{{$telefono}}">
				<label>Celular:</label>
				<input type="text" class="form-control mb-2" name="celular" id="celular" value="{{$celular}}">
				<div class="row">
					<div class="col-10"></div>
					<button type="submit" class="btn btn-primary col-1 ml-5 mb-2 float-right">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>