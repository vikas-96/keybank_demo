<?php

namespace App\Models;

use Moloquent;
use EloquentFilter\Filterable;

class Valuer extends Moloquent
{
    use Filterable;
    
    protected $fillable = ['name', 'contact', 'email', 'is_active'];

    /**
     * [asset description]
     * @return [type] [description]
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }

    public function setIsActiveAttribute($value){
        $this->attributes['is_active'] = (bool) $value;
    }
    
}
