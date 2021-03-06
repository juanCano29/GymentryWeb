<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <style>
        </style>
    </head>
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
        <div align="center">
            <h1 class="display-4">Productos</h1>
        </div>
        <br><br>
        <div class="row row-cols-1 row-cols-md-2">
          <div class="col mb-4">
            <div class="card">
              <!--<img src="..." class="card-img-top" alt="..."> -->
               <div class="card-header">Añadir Producto Nuevo</div>
                    <div class="card-body">
                    <br>
                    <form method="POST" action="{{url("/registrarProducto")}}">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label>Nombre de Producto</label>
                            <input type="text" class="form-control" name="producto_nombre" id="producto_nombre" required>
                            <br>
                            <label for="comment">Precio</label>
                            <input type="text" class="form-control" name="producto_precio" id="producto_precio" required></input>
                            <br>
                            <button type="submit" class="btn btn-primary" name="name_button_crear_producto" id="id_button_crear_producto" >Registrar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="card">
              <!--<img src="..." class="card-img-top" alt="..."> -->
               <div class="card-header">Modificar descuento de producto</div>
                    <div class="card-body">
                    <br>
                    <form method="POST" action="{{url("/descuentoProducto")}}">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label>Producto</label>
                            <select name="producto_desc_id" class="form-control" id="producto_desc_id" required>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->productos_id}}">{{$producto->nombre}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label for="comment">descuento</label>
                            <input class="form-control" name="producto_descuento" id="producto_descuento" required></input>
                            <br>
                            <label for="comment">Fecha de inicio de descuento</label>
                            <input type="date" class="form-control" name="producto_fecha_in" id="producto_fecha_in" required></input>
                            <br>
                            <label for="comment">Fecha de Finalizacion de descuento</label>
                            <input type="date" class="form-control" name="producto_fecha_fin" id="producto_fecha_fin" required></input>
                            <br>
                            <button type="submit" class="btn btn-primary" name="name_button_crear_desc" id="id_button_crear_desc" >Aplicar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <!--<img src="..." class="card-img-top" alt="..."> -->
        <div class="card-header">Reporte de Ganancias por Producto</div>
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="min-width: 50%" scope="col">Nombre Producto</th>
                      <th scope="col">Ganancias</th>
                      <th style="min-width: 15%" scope="col">Unidades vendidas</th>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
                    foreach ($reportes as $reporte) {
                        echo "<tr>";
                            echo "<td>".$reporte->nombre."</td>";
                            echo "<td>".($reporte->uni_vend) * ($reporte->precio) ."</td>";
                            echo "<td>".$reporte->uni_vend."</td>";
                        echo "</tr>";
                    }
                    ?>


                  </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
    $(document).ready(function(){

    });
    $("#id_button_crear_producto").click(function(){
        var prod_nombre = $("#producto_nombre").val();
        var prod_precio = $("#producto_precio").val();
        if (prod_nombre.length != 0 && prod_precio.length != 0){
             alert("se ha registrado el producto de manera exitosa");
        }

    });

    $("#id_button_crear_desc").click(function(){
        var prod_descuento = $("#producto_descuento").val();
        var prod_fecha_in = $("#producto_fecha_in").val();
        var prod_fecha_fin = $("#producto_fecha_fin").val();
        if (prod_descuento.length != 0 && prod_fecha_in.length != 0 && prod_fecha_fin.length != 0){
             alert("se han guardado los cambios de manera exitosa");
        }
    });

    $("#desc_select_prod").change(function(){
        var id = $(this).val();
        alert(id);
    });

</script>
</html>
