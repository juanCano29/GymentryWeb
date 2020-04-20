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
	<br>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10 border">
			<form method="POST" action="{{url("/actualizarinstructor/?id=$instructor->_id")}}">
				{{csrf_field()}}
				<center><h2>Modificar Instructor</h2></center>
				<br>
				<label>Nombre completo:</label>
				<input type="text" id="nombre" name="nombre" class="form-control mb-2" value="{{$instructor->nombre_completo}}" required>
				<label>Especialidad:</label>
				<input type="text" id="especialidad" name="especialidad" class="form-control mb-2" value="{{$instructor->especialidad}}">
				<label>Coste:</label>
				<input type="text" id="coste" name="coste" class="form-control mb-2" value="{{$instructor->coste}}" required>
				<center><h3>Teléfonos</h3></center>
				<div class="border">
					<label>Teléfonos:</label>
					@foreach(current($telefonos_array) as $tel)
					<div class="row mb-2">
						<div class="col-2"></div>
						<div class="col-5">
							<p>{{$tel}}</p>
						</div>
						<div class="col-1"></div>
						<a type="button" id="guardartelefono" href="/telefonoinstructores/{{$instructor->_id}}/{{$tel}}/t" class="btn btn-dark col-1">Editar</a>
					</div>
					@endforeach
					<label>Celulares:</label>
					@foreach(end($telefonos_array) as $cel)
					<div class="row mb-2">
						<div class="col-2"></div>
						<div class="col-5">
							<p>{{$cel}}</p>
						</div>
						<div class="col-1"></div>
						<a type="button" id="guardarcelular" href="/telefonoinstructores/{{$instructor->_id}}/{{$cel}}/c" class="btn btn-dark col-1">Editar</a>
					</div>
					@endforeach
				</div>
				<label>Nuevo Telefono:</label>
				<input type="text" id="telefononuevo" name="telefononuevo" class="form-control mb-2" placeholder="14-123-12">
				<label>Celular Nuevo:</label>
				<input type="text" id="celularnuevo" name="celularnuevo" class="form-control mb-2" placeholder="451-123-32-34">
				<hr>
				<label>Horario:</label>
				<input type="text" id="horario" name="horario" class="form-control mb-2" value="{{$instructor->horario}}" required>
				<label>Sueldo Mensual:</label>
				<input type="text" id="sueldo" name="sueldo" class="form-control mb-2" value="{{$instructor->sueldo_mensual}}" required>
				<label>Fecha del Contrato:</label>
				<input type="date" id="fecha" name="fecha" class="form-control mb-2" value="{{$instructor->fecha_contrato}}" required>
				<button type="submit" class="btn btn-primary col-1 ml-5 mt-5 mb-2 float-right">Guardar</button>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>