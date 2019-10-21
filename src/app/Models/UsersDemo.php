<?php

namespace App\Models;

use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class UsersDemo extends Moloquent
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * [state description]
     * @return [type] [description]
     */
    public function state()
    {
        return $this->hasOne('App\Models\LocationMaster', '_id', 'states')->select('state');
    }
    /**
     * [city description]
     * @return [type] [description]
     */
    public function city()
    {
        return $this->hasOne('App\Models\LocationMaster', '_id', 'cities')->select('_id','city')->where('type', 'city');
    }
}
