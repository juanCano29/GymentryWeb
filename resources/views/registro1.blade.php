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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ventas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/ventaproductos">Realizar ventas</a>
                  <hr>
                  <a class="dropdown-item" href="/reporteventas">Reporte_ventas</a>
                  <a class="dropdown-item" href="/reporteproductos">Reporte_ventas</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

	@if($errors->any())
	<center>
		<div class="alert alert-info" role="alert">
		  {{$errors->first()}}
		</div>
	</center>
	@endif
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10 mt-5 border">
			<center class="mt-5">
				<h2>Nuevo Cliente</h2>
			</center>
			<label class="mt-5">Ingresar los datos solicitados en los campos correspondientes sin dejar campos vacios. Una vez ingresados, dar click en el botón de registrar para capturar los datos en el sistema</label>
			<form class="mt-5" method="POST" action="{{url("/registrarcliente")}}">
				{{csrf_field()}}
				<label>Nombre(s):</label>
				<input type="text" class="form-control mb-2" name="nombre" id="nombre" placeholder="Elja" required>
				<label>Apellido Paterno:</label>
				<input type="text" class="form-control mb-2" name="apaterno" id="apaterno" placeholder="Rioso" required>
				<label>Apellido Materno:</label>
				<input type="text" class="form-control mb-2" name="amaterno" id="amaterno" placeholder="Bolsa" required>
				<label>Fecha de Nacimiento:</label>
				<input type="date" class="form-control mb-2" name="nacimiento" id="nacimiento" required>
				<label>Identificacion:</label>
				<input type="file" class="form-control-file border mb-2" id="identificador" name="identificador">
				<label>Capital:</label>
				<input type="text" class="form-control mb-2" name="capital" id="capital" placeholder="0.00" required>
				<br>
				<hr>
				<br>
				<center>DIRECCIÓN</center>
				<label>Colonia:</label>
				<input type="text" class="form-control mb-2" name="colonia" id="colonia" placeholder="Colonia" required>
				<label>Calle:</label>
				<input type="text" class="form-control mb-2" name="calle" id="calle" placeholder="Calle" required>
				<label>Número domiciliario:</label>
				<input type="text" class="form-control mb-2" name="numero" id="numero" placeholder="#" required>
				<br>
				<hr>
				<br>
				<center>TELÉFONO</center>
				<label>Doméstico:</label>
				<input type="text" class="form-control mb-2" name="domestico" id="domestico" placeholder="564-23-57">
				<label>Celular:</label>
				<input type="text" class="form-control mb-2" name="celular" id="celular" placeholder="871-674-85-57">
				<br>
				<hr>
				<br>
				<center>TIPO CLIENTE</center>
				<label>Tipo de cliente:</label>
				<input type="text" class="form-control mb-2" name="tcliente" id="tcliente" placeholder="tipo de cliente" required>
				<label>Descuento:</label>
				<input type="text" class="form-control mb-2" name="tdescuento" id="tdescuento" placeholder="0.00" required>
				<div class="row mb-2">
					<div class="col-10 mr-4"></div>
					<button type="submit" class="btn btn-primary col-1 ml-5 float-right">Registrar</button>
				</div>
			</form>
		</div>
		<div class="col-1"></div>
	</div>
</body>
</html>