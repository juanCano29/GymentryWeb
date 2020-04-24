<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;
use App\Instructores;

class clientescontroller extends Controller
{
    function guardarcliente(Request $r){
        $telefonos = [];
        $direcciones = [];
        $clientes2 = Clientes::all();
        $id = rand(1,999999999);
        if(count($clientes2)>1){
            $existe = true;
            while ($existe) {
                foreach ($clientes2 as $cli2) {
                    $existe = false;
                    if($cli2->_id == $id){
                        $existe = true;
                        $id = rand(1,999999999);
                    }
                }
            }
        }
        $id = "".$id;
    	$arraydireccion = array('colonia' => $r->colonia, 'calle' => $r->calle, 'numero' => $r->numero);
        $direcciones[0] = $arraydireccion;
	    $client = new Clientes();
        $client->idcliente = $id;
	    $client->nombre= $r->nombre;
	  	$client->apaterno= $r->apaterno;
	    $client->amaterno = $r->amaterno;
	  	$client->fecha_nac = $r->nacimiento;
	   	$client->identificacion = $r->identificador;
	   	$client->capital = $r->capital;
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
        $cliente->direccion = $nuevocliente['direccion'];

        $cliente->save();
        $todoelcliente = Clientes::find($id);
        $tipos_clientes = $todoelcliente->tipos_clientes;
        return view('modificarcliente', compact('todoelcliente', 'tipos_clientes'));
    }

    function actualizartelf($numero, $id){
        $cliente = Clientes::find($id);
        $telefono = "";
        $celular = "";
        foreach ($cliente->telefono as $telf) {
            $celular = "";
            if(count($telf) == 1){
                $telefono = current($telf);
            }
            elseif(count($telf) == 2){
                $telefono = current($telf);
                $celular = next($telf);
            }
        }
        return view('actualizartelfono', compact('numero','id','telefono','celular'));
    }

    function acttelf(Request $r){
        $id = $_GET['id'];
        $numero = $_GET['numero'];
        $clientes = Clientes::find($id);
        $telefonos = [];

        for ($i=0; $i < count($clientes->telefono); $i++) {
            if($clientes->telefono[$i]['telefono'] == $numero){
                if($r->telefono != null){
                    if($r->celular != null){
                        $arraytelefono = array('telefono' => $r->telefono, 'celular' => $r->celular);
                    } else{
                        $arraytelefono = array('telefono' => $r->telefono);
                    }
                    $telefonos[$i] = $arraytelefono;
                }
            }
            else{
                $telefonos[$i] = $clientes->telefono[$i];
            }
        }

        $clientes->telefono = $telefonos;
        $clientes->save();
        $todoelcliente = Clientes::find($id);
        $tipos_clientes = $todoelcliente->tipos_clientes;
        return view('modificarcliente', compact('todoelcliente', 'tipos_clientes'));
    }

    function actualizartodo(Request $r){
        $id = $_GET['id'];
        $direcciones = [];
        $telefonos = [];
        $variable = "";
        $clientes = Clientes::find($id);
        $clientes->nombre = $r->nombre;
        $clientes->apaterno = $r->apaterno;
        $clientes->amaterno = $r->amaterno;
        $clientes->fecha_nac = $r->nacimiento;
        $clientes->capital = $r->capital;
        if ($r->colonia != null && $r->calle != null && $r->numero != null) {
            for ($i=0; $i <= count($clientes->direccion); $i++) {
                if($i<count($clientes->direccion)){
                    $arraydireccion = $clientes->direccion[$i];
                }else{
                    $arraydireccion = array('colonia' => $r->colonia, 'calle' => $r->calle, 'numero' => $r->numero);
                }
                $direcciones[$i] = $arraydireccion;
            }
            $clientes->direccion = $direcciones;
        }else{
            $clientes->direccion = $clientes->direccion;
        }
        if($r->domestico != null){
            if($r->celular != null){
                for ($i=0; $i <= count($clientes->telefono); $i++) {
                    if($i < count($clientes->telefono)){
                        $arraytelefono = $clientes->telefono[$i];
                    }else{
                        $arraytelefono = array('telefono' => $r->domestico, 'celular' => $r->celular);
                    }
                    $telefonos[$i] = $arraytelefono;
                }
                $clientes->telefono = $telefonos;
            }else{
                for ($i=0; $i <= count($clientes->telefono); $i++) {
                    if($i < count($clientes->telefono)){
                        $arraytelefono = $clientes->telefono[$i];
                    }else{
                        $arraytelefono = array('telefono' => $r->domestico);
                    }
                    $telefonos[$i] = $arraytelefono;
                }
                $clientes->telefono = $telefonos;
            }
        }else{
            $clientes->telefon = $clientes->telefono;
        }
        $arraytipocliente = array('tipo_cliente' => $r->tcliente, 'descuento' => $r->tdescuento);
        $clientes->tipos_clientes = $arraytipocliente;
        $clientes->estatus = $r->estatus;
        $clientes->save();
        $clientes = Clientes::all();
        return view('clienteslista', compact('clientes'));
    }

    function eliminarcliente($id){
        Clientes::destroy($id);
        return back();
    }

    function clientesnoinstruidos(){
        $clientes = Clientes::all();
        $sininstructor = [];
        foreach ($clientes as $cli) {
            if($cli->idinstructor == null){
                array_push($sininstructor, $cli);
            }
        }
        return view('sininstructor', compact('sininstructor'));
    }

    function listadoinstructores($id){
        $instructores = Instructores::all();
        return view('asignaciondeinstructores', compact('id','instructores'));
    }

    function instructorcliente($cli, $inst){
        $cliente = Clientes::find($cli);
        $cliente->idinstructor = $inst;
        $cliente->save();
        $clientes = Clientes::all();
        $sininstructor = [];
        foreach ($clientes as $cli) {
            if($cli->idinstructor == null){
                array_push($sininstructor, $cli);
            }
        }
        return view('sininstructor', compact('sininstructor'));
    }
    function statuscliente(){
        return view('verificarestatus');
    }
    function verificador(Request $request){
        $id = "".$request->input('id');
        $cliente = Clientes::all()->where('idcliente','=',$id);
        return  view('verificarestatus',compact('cliente'));
    }
}
