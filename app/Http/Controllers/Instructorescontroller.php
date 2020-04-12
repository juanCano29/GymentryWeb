<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Instructores;

class Instructorescontroller extends Controller
{
    function registro_instructores(Request $r){
    	$instructores = Instructores::all();
    	return $instructores;
    }
}
