<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructores;
use Illuminate\Support\Facades\DB;

class prueba extends Controller
{
	// consulta a mongo
    public function consulta1(){
    	$data = Instructores::all();
    	return $data;
    }
    // consulta a mysql
    public function consulta2(){
    	$user = DB::connection('mysql')->select('select * from prueba');
    	return $user;
    }

     public function ver_nombres_productos(){
    
        $productos_array = DB::table('productos')->select('nombre')->get();
        $nombre = json_encode($productos_array[0]->nombre);

        return view('CrearProducto',compact('nombre'));

    //  $consulta = DB::table('productos')
    //         ->select('*')     
    //         ->get();
    //  return $consulta;

    //  $consulta = DB::table('usuarios')
    //          ->select('*')
    //         ->join('productos', 'productos.producto_id', '=', 'usuarios.usu_id')
    //         ->orWhere('cli_rfc', 'LIKE', '%'.$request->datos["rfc"].'%')
    //         ->get();
    //  return $consulta;

    }
}
