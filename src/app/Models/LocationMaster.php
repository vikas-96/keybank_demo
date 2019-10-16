<?php

namespace App\Models;

use Moloquent;

class LocationMaster extends Moloquent
{
    protected $table = "location_master";

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }
}
