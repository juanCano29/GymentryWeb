<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructores;

class prueba extends Controller
{
    public function consulta1(){
    	$data = Instructores::all();
    	return $data;
    }
}
