<?php

namespace App\Models;
use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
class MigratingBranch extends Moloquent
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }
}
