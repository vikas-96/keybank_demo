<?php

namespace App\Models;

use Moloquent;
use App\Extensions\CTokenModelTrait;
use Maklad\Permission\Traits\HasRoles;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\MustVerifyEmail;

class User extends Moloquent implements Authenticatable, CanResetPasswordContract
{
    use CTokenModelTrait, Notifiable, SoftDeletes, HasRoles, AuthenticatableTrait, CanResetPassword, MustVerifyEmail;

    protected $guard_name = 'api';

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'contact_number', 'is_active'];

    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }

    public function setIsActiveAttribute($value){
        $this->attributes['is_active'] = (bool) $value;
    }

}
