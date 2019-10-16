<?php

namespace App\Models;

use Moloquent;

class AuthToken extends Moloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'access_token', 'expires_at', 'revoked',
    ];
}