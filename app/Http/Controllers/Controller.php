<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function productos(){
        //$productos_array = DB::table('productos')->select('nombre')->get();
        //$nombre = json_encode($productos_array[0]->nombre);
        /*$productos = DB::table('productos')
        ->select('productos_id','nombre')
        ->get();*/
        $productos = DB::connection('mysql')->select('select productos_id, nombre from productos');

        /*$reportes = DB::table('productos')
        ->join('orden_venta','orden_venta.productos_id','=','productos.productos_id')
        ->select('productos.nombre','productos.precio',DB::raw('(SUM(orden_venta.cantidad)) as uni_vend'))
        ->groupBy('productos.nombre','productos.precio')
        ->get();*/
        $reportes = DB::connection('mysql')->select('select productos.nombre, productos.precio, sum(orden_venta.cantidad) as uni_vend from productos inner join orden_venta on orden_venta.productos_id = productos.productos_id group by productos.nombre, productos.precio');

        return view('productos.form_productos',compact('productos','reportes','num_productos'));
    }

    function reg_prod(Request $p){
        
        $prod_nombre = $p->producto_nombre;
        $prod_precio = $p->producto_precio;
        // DB::insert('insert into productos (nombre,precio) values (?,?)', [$prod_nombre,$prod_precio] );
        DB::connection('mysql')->select('insert into productos(nombre, precio) values("'.$prod_nombre.'",'.$prod_precio.')');
        return back()->withErrors(['El producto se registro correctamente']);
    }

    function venderproductos(){
        $productos = DB::connection('mysql')->select('select productos.productos_id as productos_id, productos.nombre as nombre, if(descuentos.fechainicio-1 < date(now()) and descuentos.fechavencimiento+1 > date(now()), productos.precio - (descuentos.porcentaje/100 * productos.precio), productos.precio) as precio from productos left join descuentos on descuentos.productos_id = productos.productos_id');
        return view('productos.venta_productos', compact('productos'));
    }
    function ordenventa($id){
        $producto = DB::connection('mysql')->select('select productos.productos_id as productos_id, productos.nombre as nombre, if(descuentos.fechainicio-1 < date(now()) and descuentos.fechavencimiento+1 > date(now()), productos.precio - (descuentos.porcentaje/100 * productos.precio), productos.precio) as precio from productos left join descuentos on descuentos.productos_id = productos.productos_id where productos.productos_id = '.$id);
        $producto = $producto[0];
        return view('productos.orden_venta', compact('producto'));
    }
    function productovendido(Request $r){
        $id = DB::connection('mysql')->select("select productos_id from productos where nombre = '".$r->producto."'");
        $fecha = getdate();
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];
        if ($mes < 10) {
            $mes = "0".$mes;
        }
        if ($dia < 10) {
            $dia = "0".$dia;
        }
        $fechactual = $fecha['year']."-".$mes."-".$dia;
        DB::connection('mysql')->select("insert into orden_venta(productos_id,cantidad,fecha) values(".$id[0]->productos_id.",".$r->cantidad.",'".$fechactual."')");
        return $this->venderproductos();
    }
}
