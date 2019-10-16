<?php

namespace App\Models;

use Moloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthClient extends Moloquent
{
	use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'secret',
    ];
}
