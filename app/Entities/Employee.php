<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Employee extends Model implements Transformable, AuthenticatableContract, CanResetPasswordContract
{
    use TransformableTrait, Notifiable, Authenticatable, CanResetPassword;

    protected $fillable = ['name', 'phone', 'password', 'birthday', 'role', 'sex', 'start_date', 'address', 'salary'];
    protected $table = 'employees';
    protected $hidden = ['remember_token'];

    public function roles() {
        return $this->belongsTo('App\Entities\Roles', 'role');
    }

    public function hasRole($role)
    {
        return $this->roles->hasRole($role);
    }

    public function hasAnyRole(...$roles)
    {
        return $this->roles()->whereIn('name', $roles)->count() > 0;
    }
}