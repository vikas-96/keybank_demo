<?php

namespace App\Models;

use Moloquent;
use Maklad\Permission\Models\Permission as MakladPermission;

class Permission extends MakladPermission
{
    protected $fillable = [
        'display_name', 'name', 'guard_name'
    ];
}
