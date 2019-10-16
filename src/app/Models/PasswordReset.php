<?php

namespace App\Models;

use Moloquent;

class PasswordReset extends Moloquent
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'token'
    ];
}
