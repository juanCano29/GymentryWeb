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
	@if($errors->any())
	<center>
		<div class="alert alert-info" role="alert">
		  {{$errors->first()}}
		</div>
	</center>
	@endif
	<div class="row mt-5">
		<div class="col-1"></div>
		<div class="col-10 border">
			<center><h2>Registro de Instructores</h2></center>
			<form class="mt-2" method="POST" action="{{url("/registroinstructores")}}">
				{{csrf_field()}}
				<p class="mb-5">Favor de llenar los campos con los datos requeridos</p>
				<label>Nombre Completo:</label>
				<input type="text" id="nombre" name="nombre" class="form-control mb-2" placeholder="pifi rodriguez" required>
				<label>Especialidad:</label>
				<input type="text" id="especialidad" name="especialidad" class="form-control mb-2" placeholder="cardio">
				<label>Coste (cifra en pesos):</label>
				<input type="text" id="coste" name="coste" class="form-control mb-2" placeholder="1000.00" required>
				<label>Telefono:</label>
				<input type="text" id="telefono" name="telefono" class="form-control mb-2" placeholder="7-30-23-73" required>
				<label>Celular:</label>
				<input type="text" id="celular" name="celular" class="form-control mb-2" placeholder="871-17-711-53" required>
				<hr>
				<center><h3>Horarios</h3></center>
				<label>Horario:</label>
				<input type="text" id="horario" name="horario" class="form-control mb-2" placeholder="lunes a viernes de 13:00 a 21:00" required>
				<hr>
				<center><h3>Sueldos</h3></center>
				<label>Sueldo mensual (cifra en pesos):</label>
				<input type="text" id="sueldo" name="sueldo" class="form-control mb-2" placeholder="1000.00" required>
				<label>Fecha del contrato:</label>
				<input type="date" id="fechacontrato" name="fechacontrato" class="form-control mb-2" required>
				<hr>
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