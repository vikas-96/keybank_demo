<?php

namespace App\Models;

use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class IncrementalId extends Moloquent
{
    use SoftDeletes;

    protected $guarded = [];
}
