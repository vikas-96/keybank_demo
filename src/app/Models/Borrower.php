<?php

namespace App\Models;

use Moloquent;
use EloquentFilter\Filterable;

class Borrower extends Moloquent
{
    use Filterable;
    
    protected $fillable = ['name', 'cif', 'is_active'];

    public function setIsActiveAttribute($value){
        $this->attributes['is_active'] = (bool) $value;
    }
    
}
