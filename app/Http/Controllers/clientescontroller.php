<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;

class clientescontroller extends Controller
{
    function guardarcliente(Request $r){
    	$arraydireccion = array('colonia' => $r->colonia, 'calle' => $r->calle, 'numero' => $r->numero);
	    $client = new Clientes();
	    $client->nombre= $r->nombre;
	  	$client->apaterno= $r->apaterno;
	    $client->amaterno = $r->amaterno;
	  	$client->fecha_nac = $r->nacimiento;
	   	$client->identificacion = $r->identificador;
	   	$client->capital = $r->capital;
    	$client->cod_qr = "sgre2542346asd";
	    $client->direccion = $arraydireccion;
    	if($r->domestico != null){
    		if($r->celular != null){
    			$arraytelefono = array('telefono' => $r->domestico, 'celular' => $r->celular);
    			$client->telefono = $arraytelefono;
    		}else{
    			$arraytelefono = array('telefono' => $r->domestico);
    			$client->telefono = $arraytelefono;
    		}
    	}
    	$arraytipocliente = array('tipo_cliente' => $r->tcliente, 'descuento' => $r->tdescuento);
    	$client->tipos_clientes =  $arraytipocliente;
    	$client->estatus = "activo";
    	$client->save();
    	return back()->withErrors(['el cliente se registró correctamente']);
    }
}
