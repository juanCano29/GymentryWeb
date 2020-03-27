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
    <body>
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
                    <form>
                        <div class="form-group">
                            <label>Nombre de Producto</label>
                            <input type="text" class="form-control" name="name_producto_nombre" id="id_producto_nombre">
                            <br>
                            <label for="comment">Precio</label>
                            <input type="text" class="form-control" name="name_producto_precio" id="id_producto_precio"></input>
                            <br>
                            <button type="submit" class="btn btn-primary" name="name_button_crear_producto" id="id_button_crear_producto" >Crear Producto</button>
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
                    <form>
                        <div class="form-group">
                            <label>Producto</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Toalla</option>
                              <option>Powerade 1 litro</option>
                            </select>
                            <br>
                            <label for="comment">descuento</label>
                            <input class="form-control" name="name_producto_descuento" id="id_producto_descuento"></input>
                            <br>
                            <label for="comment">Fecha de inicio de descuento</label>
                            <input type="date" class="form-control" name="name_producto_fecha_in" id="id_producto_fecha_in"></input>
                            <br>
                            <label for="comment">Fecha de Finalizacion de descuento</label>
                            <input type="date" class="form-control" name="name_producto_fecha_fin" id="id_producto_fecha_fin"></input>
                            <br>
                            <button type="submit" class="btn btn-primary" name="name_button_mod_producto" id="id_button_crear_producto" >Aplicar cambios</button>
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
                      <th scope="col">Nombre Producto</th>
                      <th scope="col">Ganancias</th>
                      <th scope="col">Unidades vendidas</th>
                      <th scope="col">Capital de desucnto</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
            </div>
        </div>
    </body>

</html>
