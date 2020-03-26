<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Instructores extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'instructores';
    protected $guarded = [];
}
