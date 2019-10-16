<?php

namespace App\Models;

use Moloquent;

class Banklist extends Moloquent
{
    protected $fillable = ['bank_name'];

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }

}
