<?php

namespace App\Models;

use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class BorrowerDemo extends Moloquent
{
    use SoftDeletes;

    protected $guarded = [];
}
