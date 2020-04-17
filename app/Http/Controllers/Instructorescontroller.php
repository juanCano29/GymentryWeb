<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Instructores;

class Instructorescontroller extends Controller
{
    function registro_instructores(Request $r){
    	$telefonos[0] = $r->telefono;
    	$celulares[0] = $r->celular;
    	$array_telefono = array('telefonos'=>$telefonos,'celulares'=>$celulares);
    	$instructores2 = Instructores::all();
    	$id = rand(1,999999999);
        if(count($instructores2)>1){
            $existe = true;
            while ($existe) {
                foreach ($instructores2 as $inst2) {
                    $existe = false;
                    if($inst2->_id == $id){
                        $existe = true;
                        $id = rand(1,999999999);
                    }
                }
            }
        }
        $id = "".$id;
    	$instructores = new Instructores();
    	$instructores->idinstructores = $id; 
    	$instructores->nombre_completo = $r->nombre;
    	$instructores->especialidad = $r->especialidad;
    	$instructores->coste = $r->coste;
    	$instructores->telefonos = $array_telefono;
    	$instructores->horario = $r->horario;
    	$instructores->sueldo_mensual = $r->sueldo;
    	$instructores->fecha_contrato = $r->fechacontrato;
    	$instructores->save();
    	return back()->withErrors(['el instructor se registró correctamente']);
    }
    function listainstructores(){
    	$instructores = Instructores::all();
    	return view('instructoreslista',compact('instructores'));
    }
    function instructselct($id){
    	$instructor = Instructores::find($id);
    	$telefonos_array = $instructor->telefonos;
    	return view('modificarinstructor', compact('instructor','telefonos_array'));
    }
    function actualizar(Request $r){
    	$id = $_GET['id'];
    	$instructor = Instructores::find($id);
    	$arraytelefonos = $instructor->telefonos;
    	$telefonos = reset($arraytelefonos);
    	$celulares = end($arraytelefonos);
    	if ($r->telefononuevo != null) {
    		$arreglotelefonos = reset($arraytelefonos);
    		for ($i=0; $i < count($arreglotelefonos)+1; $i++) { 
    			if($i != count($arreglotelefonos)){
    				$telefonos[$i] = $arreglotelefonos[$i];
    			}
    			else{
    				$telefonos[$i] = $r->telefononuevo;
    			}
    		}
    	}
    	if ($r->celularnuevo != null) {
    		$arreglocelulares = end($arraytelefonos);
    		for ($i=0; $i < count($arreglocelulares)+1; $i++) { 
    			if ($i != count($arreglocelulares)) {
    				$celulares[$i] = $arreglocelulares[$i];
    			}else{
    				$celulares[$i] = $r->celularnuevo;
    			}
    		}
    	}
    	$arraytelefonos = array('telefonos' => $telefonos, 'celulares' => $celulares);
    	$instructor->nombre_completo = $r->nombre;
    	$instructor->especialidad = $r->especialidad;
    	$instructor->coste = $r->coste;
    	$instructor->telefonos = $arraytelefonos;
    	$instructor->horario = $r->horario;
    	$instructor->sueldo_mensual = $r->sueldo;
    	$instructor->fecha_contrato = $r->fecha;
    	$instructor->save();
    	$instructores = Instructores::all();
    	return view('instructoreslista',compact('instructores'));
    }
    function actualizartelefonos($id,$numero,$tipo){
    	return view('actualizartelfonoinstructor', compact('id','numero','tipo'));
    }
    function telefonoactualizado(Request $r){
    	$instructor = Instructores::find($r->id);
	    $arraytelefonos = $instructor->telefonos;
	    $arreglotelefonos = reset($arraytelefonos);
	    $arreglocelulares = end($arraytelefonos);
	    $telefonos = $arreglotelefonos;
	    $celulares = $arreglocelulares;
	    if ($r->numerocambiar != null) {
	    	if ($r->tipo == 't') {
		    	for ($i=0; $i < count($arreglotelefonos); $i++) { 
		    		if ($arreglotelefonos[$i] != $r->numero) {
		    			$telefonos[$i] = $arreglotelefonos[$i];
		    		}else{
		    			$telefonos[$i] = $r->numerocambiar;
		    		}
		    	}
	    	}elseif ($r->tipo == 'c') {
	    		for ($i=0; $i < count($arreglocelulares); $i++) { 
	    			if ($arreglocelulares[$i] != $r->numero) {
	    				$celulares[$i] = $arreglocelulares[$i];
	    			}else{
	    				$celulares[$i] = $r->numerocambiar;
	    			}
	    		}
	    	}
	    }else{
	    	if ($r->tipo == 't') {
	    		$telefonos = [];
		    	for ($i=0; $i < count($arreglotelefonos); $i++) { 
		    		if ($arreglotelefonos[$i] != $r->numero) {
		    			$telefonos[$i] = $arreglotelefonos[$i];
		    		}
		    	}
	    	}elseif ($r->tipo == 'c') {
	    		$celulares = [];
	    		for ($i=0; $i < count($arreglocelulares); $i++) { 
	    			if ($arreglocelulares[$i] != $r->numero) {
	    				$celulares[$i] = $arreglocelulares[$i];
	    			}
	    		}
	    	}
	    }
    	$arraytelefonos = array('telefonos' => $telefonos, 'celulares' => $celulares);
    	$instructor->telefonos = $arraytelefonos;
    	$instructor->save();
    	$instructor = Instructores::find($r->id);
    	$telefonos_array = $instructor->telefonos;
    	return view('modificarinstructor', compact('instructor','telefonos_array'));
    }

    function eliminarinstructor($id){
    	Instructores::destroy($id);
    	return back();
    }
}
