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
                  <a class="dropdown-item" href="/verificarstatus">Verificar estatus</a>
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ventas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                	<a class="dropdown-item" href="/productos">Alta Productos</a>
                  <a class="dropdown-item" href="/ventaproductos">Realizar ventas</a>
                  <hr>
                  <a class="dropdown-item" href="/reporteventas">Reporte_ventas</a>
                  <a class="dropdown-item" href="/reporteproductos">Reporte_ventas</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
	<br>
	<br>
	<center><h3>Reporte diario de ventas</h3></center>
	<br>
	<br>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<div class="border">
				<label class="mt-2 ml-2">Último reporte:</label>
				<div class="row">
					<div class="col-1"></div>
					<table class="table col-10">
						<thead class="thead-dark">
							<tr>
								<th scope="col">id</th>
								<th scope="col">ganancias</th>
								<th scope="col">cantidad de productos vendidos</th>
								<th scope="col">fecha</th>
								<th scope="col">suma de descuentos</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								@if($ultimoreporte)
								<td>{{$ultimoreporte->reporte_ventas_id}}</td>
								<td>{{$ultimoreporte->ganancias}}</td>
								<td>{{$ultimoreporte->cantidad_productos}}</td>
								<td>{{$ultimoreporte->fecha}}</td>
								<td>{{$ultimoreporte->total_descuentos}}</td>
								@endif
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<center><a href="/nuevoreporte" class="btn btn-success mt-2">Generar nuevo reporte</a></center>
			<input type="text" class="form-control mb-3 mt-5" name="buscador" id="idbuscador" placeholder="buscador">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">id</th>
						<th scope="col">ganancias</th>
						<th scope="col">cantidad de productos vendidos</th>
						<th scope="col">fecha</th>
						<th scope="col">suma de descuentos</th>
					</tr>
				</thead>
				<tbody id="idbody">
					@foreach($reportes as $rep)
					<tr>
						<td>{{$rep->reporte_ventas_id}}</td>
						<td>{{$rep->ganancias}}</td>
						<td>{{$rep->cantidad_productos}}</td>
						<td>{{$rep->fecha}}</td>
						<td>{{$rep->total_descuentos}}</td>
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
