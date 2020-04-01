<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Clientes extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'clientes';
    public $timestamps = false;
    protected $guarded = [];
}
