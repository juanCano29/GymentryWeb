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
			<center><h2>MODIFICAR CLIENTE</h2></center>
			<br>
			<label>Nombre(s):</label>
			<input type="text" value="{{$todoelcliente->nombre}}" class="form-control mb-2" name="nombre" id="nombre" required>
			<label>Apellido Paterno:</label>
			<input type="text" value="{{$todoelcliente->apaterno}}" class="form-control mb-2" name="apaterno" id="apaterno" required>
			<label>Apellido Materno:</label>
			<input type="text" value="{{$todoelcliente->amaterno}}" class="form-control mb-2" name="amaterno" id="amaterno" required>
			<label>Fecha de Nacimiento:</label>
			<input type="date" value="{{$todoelcliente->fecha_nac}}" class="form-control mb-2" name="nacimiento" id="nacimiento" required>
			<label>Capital:</label>
			<input type="text" value="{{$todoelcliente->capital}}" class="form-control mb-2" name="capital" id="capital" required>
			<br>
			<center>
				<label>Direcciones Registradas:</label>
			</center>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">COLONIA</th>
						<th scope="col">CALLE</th>
						<th scope="col">NUMERO</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($todoelcliente->direccion as $direccion)
					<tr>
						<td>{{current($direccion)}}</td>
						<td>{{next($direccion)}}</td>
						<td>{{next($direccion)}}</td>
						<td><a type="button" id="botondireccion" href="../actualizardireccion/{{end($direccion)}}/{{$todoelcliente->_id}}" class="btn btn-block btn-dark">EDITAR</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
			<center><label>Agregar Otro Domicilio</label></center>
			<label>Colonia:</label>
			<input type="text" class="form-control mb-2" name="colonia" id="colonia" placeholder="Colonia">
			<label>Calle:</label>
			<input type="text" class="form-control mb-2" name="calle" id="calle" placeholder="Calle">
			<label>Número domiciliario:</label>
			<input type="text" class="form-control mb-2" name="numero" id="numero" placeholder="#">
			<hr>
			<br>
			<center><label>Teléfonos</label></center>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">DOMÉSTICO</th>
						<th scope="col">CELULAR</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($todoelcliente->telefono as $telefono)
					<tr>
						<td>{{current($telefono)}}</td>
						<td>{{next($telefono)}}</td>
						<td><input type="button" class="btn btn-block btn-dark" value="EDITAR"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
			<center><label>Agregar Otro Teléfono</label></center>
			<label>Doméstico:</label>
			<input type="text" class="form-control mb-2" name="domestico" id="domestico" placeholder="564-23-57">
			<label>Celular:</label>
			<input type="text" class="form-control mb-2" name="celular" id="celular" placeholder="871-674-85-57">
			<hr>
			<br>
			<center>TIPO CLIENTE</center>
			<label>Tipo de cliente:</label>
			<input type="text" value="{{current($tipos_clientes)}}" class="form-control mb-2" name="tcliente" id="tcliente" required>
			<label>Descuento:</label>
			<input type="text" value="{{next($tipos_clientes)}}" class="form-control mb-2" name="tdescuento" id="tdescuento" required>
		</div>
	</div>
</body>
<script type="text/javascript">
</script>
</html>