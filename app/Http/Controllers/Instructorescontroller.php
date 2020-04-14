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
    	$instructores = new Instructores();
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
}
