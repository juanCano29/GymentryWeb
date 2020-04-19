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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="/">Home</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Clientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/clientes">Registrar</a>
                  <a class="dropdown-item" href="/listaclientes">Editar / eliminar</a>
                  <a class="dropdown-item" href="/clientesdesinstruidos">Asignar instructor</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Instructores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/instructures_registro">Registrar</a>
                  <a class="dropdown-item" href="/listainstructores">Editar / eliminar</a>
                  <a class="dropdown-item" href="/asistenciainstructores">Asistencia</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
	<br>
	<br>
	<center><h3>Venta Productos</h3></center>
	<br>
	<br>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<form method="POST" action="{{url("/productovendido")}}">
				{{csrf_field()}}
				<div class="row">
					<label class="col-5">Producto:</label>
					<div class="col-2"></div>
					<label class="col-5">Precio:</label>
				</div>
				<div class="row mb-2">
					<input type="text" id="producto" name="producto" class="form-control col-4 ml-2" value="{{$producto->nombre}}" readonly>
					<div class="col-3"></div>
					<input type="text" id="precio" name="precio" class="form-control col-4" value="{{$producto->precio}}" readonly>
				</div>
				<label class="mt-5">Cantidad:</label>
				<div class="row">
					<input type="number" class="form-control col-3 ml-2" id="cantidad" name="cantidad" value="1">
					<div class="col-4"></div>
					<button type="button" id="total" class="btn btn-primary col-1">total</button>
					<input type="text" class="form-control col-3" name="totalapagar" id="totalapagar" value="{{$producto->precio}}" readonly>
				</div>
				<div class="row mt-5">
					<div class="col-4">
						<label>Se pagó con:</label>
						<input type="text" class="form-control" id="cpago" name="cpago" value="0">
					</div>
					<div class="col-3"></div>
					<div class="col-4">
						<label>Cambio:</label>
						<input type="text" class="form-control" id="cambio" name="cambio" value="0" readonly>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-10"></div>
					<button type="submit" class="btn btn-success">comprar</button>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('document').ready(function(){
		$('#total').on("click", function(){
			var cantidad = $('#cantidad').val();
			var precio = $('#precio').val();
			var subtotal = cantidad * precio;
			var inputacambiar = document.getElementById('totalapagar');
			inputacambiar.value = subtotal;
		});
		$('#cpago').on("keyup", function(){
			var pago = $('#cpago').val();
			var subtotal = $('#totalapagar').val();
			var inputcambio = document.getElementById('cambio');
			inputcambio.value = pago - subtotal;
		});
	});
</script>
</html>