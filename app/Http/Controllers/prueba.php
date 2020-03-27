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
    	$user = DB::connection('mysql')->select('select * from productos');
    	return $user;
    }
}
