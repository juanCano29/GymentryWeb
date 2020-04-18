<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Asistencias_instructores extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'asistencias_instructores';
    public $timestamps = false;
    protected $guarded = [];
}
