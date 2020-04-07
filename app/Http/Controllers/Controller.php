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
        $productos = DB::table('productos')
        ->select('productos_id','nombre')
        ->get();

        $reportes = DB::table('productos')
        ->join('orden_venta','orden_venta.productos_id','=','productos.productos_id')
        ->select('productos.nombre','productos.precio',DB::raw('(SUM(orden_venta.cantidad)) as uni_vend'))
        ->groupBy('productos.nombre','productos.precio')
        ->get();

        return view('form_productos',compact('productos','reportes','num_productos'));
    }

    function reg_prod(Request $p){
        
        $prod_nombre = $p->producto_nombre;
        $prod_precio = $p->producto_precio;
        DB::insert('insert into productos (nombre,precio) values (?,?)', [$prod_nombre,$prod_precio] );
        return back()->withErrors(['El producto se registro correctamente']);
    }
}
