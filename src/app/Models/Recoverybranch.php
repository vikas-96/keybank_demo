<?php

namespace App\Models;

use Moloquent;

class Recoverybranch extends Moloquent
{
    protected $fillable = ['branch_name'];

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }
}
