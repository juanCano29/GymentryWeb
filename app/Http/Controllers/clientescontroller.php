<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;

class clientescontroller extends Controller
{
    function guardarcliente(Request $r){
        $telefonos = [];
        $direcciones = [];
    	$arraydireccion = array('colonia' => $r->colonia, 'calle' => $r->calle, 'numero' => $r->numero);
        $direcciones[0] = $arraydireccion;
	    $client = new Clientes();
	    $client->nombre= $r->nombre;
	  	$client->apaterno= $r->apaterno;
	    $client->amaterno = $r->amaterno;
	  	$client->fecha_nac = $r->nacimiento;
	   	$client->identificacion = $r->identificador;
	   	$client->capital = $r->capital;
    	$client->cod_qr = "sgre2542346asd";
	    $client->direccion = $direcciones;
    	if($r->domestico != null){
    		if($r->celular != null){
    			$arraytelefono = array('telefono' => $r->domestico, 'celular' => $r->celular);
    		}else{
    			$arraytelefono = array('telefono' => $r->domestico);
    		}
            $telefonos[0] = $arraytelefono;
    		$client->telefono = $telefonos;
    	}
    	$arraytipocliente = array('tipo_cliente' => $r->tcliente, 'descuento' => $r->tdescuento);
    	$client->tipos_clientes =  $arraytipocliente;
    	$client->estatus = "activo";
    	$client->save();
    	return back()->withErrors(['el cliente se registró correctamente']);
    }
    function clientes(){
        $clientes = Clientes::all();
        return view('clienteslista', compact('clientes'));
    }
    function clienteselec($id){
        $todoelcliente = Clientes::find($id);
        $tipos_clientes = $todoelcliente->tipos_clientes;
        return view('modificarcliente', compact('todoelcliente', 'tipos_clientes'));
    }

    public function actualizardire($numero, $id)
    {
        $cliente = Clientes::find($id);
        $direccion = $cliente->direccion;
        $colonia = "";
        $calle = "";
        foreach ($direccion as $dir) {
            if(end($dir)==$numero){
                $colonia = reset($dir);
                $calle = next($dir);
            }
        }
        return view('actualizardireccion', compact('colonia','calle','numero'));
    }
}
