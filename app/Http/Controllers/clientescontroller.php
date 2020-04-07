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
        return view('actualizardireccion', compact('colonia','calle','numero','id'));
    }
    function actdir(Request $r){
        $id = $_GET['id'];
        $numero = $_GET['numero'];
        $cliente = Clientes::find($id);
        $nuevocliente['nombre'] = $cliente->nombre;
        $nuevocliente['apaterno'] = $cliente->apaterno;
        $nuevocliente['amaterno'] = $cliente->amaterno;
        $nuevocliente['fecha_nac'] = $cliente->fecha_nac;
        $nuevocliente['identificacion'] = $cliente->identificacion;
        $nuevocliente['capital'] = $cliente->capital;
        $nuevocliente['cod_qr'] = $cliente->cod_qr;
        $direcciones = [];
        $arraydireccion = array('colonia' => $r->colonia, 'calle' => $r->calle, 'numero' => $r->numero);
        for ($i=0; $i < count($cliente->direccion) ; $i++) { 
            if ($cliente->direccion[$i]['numero'] == $r->numero) {
                $direcciones[$i] = $arraydireccion;
            }
            else{
                $direcciones[$i] = $cliente->direccion[$i];
            }
        }
        $nuevocliente['direccion'] = $direcciones;
        $nuevocliente['telefono'] = $cliente->telefono;
        $nuevocliente['tipos_clientes'] = $cliente->tipos_clientes;
        $nuevocliente['estatus'] = $cliente->estatus;

        $cliente->nombre = $nuevocliente['nombre'];
        $cliente->apaterno = $nuevocliente['apaterno'];
        $cliente->amaterno = $nuevocliente['amaterno'];
        $cliente->fecha_nac = $nuevocliente['fecha_nac'];
        $cliente->identificacion = $nuevocliente['identificacion'];
        $cliente->capital = $nuevocliente['capital'];
        $cliente->cod_qr = $nuevocliente['cod_qr'];
        $cliente->direccion = $nuevocliente['direccion'];
        $cliente->telefono = $nuevocliente['telefono'];
        $cliente->tipos_clientes = $nuevocliente['tipos_clientes'];
        $cliente->estatus = $nuevocliente['estatus'];

        $cliente->save();
        $todoelcliente = Clientes::find($id);
        $tipos_clientes = $todoelcliente->tipos_clientes;
        return view('modificarcliente', compact('todoelcliente', 'tipos_clientes'));
    }
}
