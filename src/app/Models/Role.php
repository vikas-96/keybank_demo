<?php

namespace App\Models;

use Moloquent;
use Maklad\Permission\Models\Role as MakladRole;

class Role extends MakladRole
{
	// protected $guard_name = 'api';
	// protected $guarded = [];
    protected $fillable = [
        'display_name', 'name', 'guard_name'
    ];
}
