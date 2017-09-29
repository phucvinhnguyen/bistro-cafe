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

    protected $fillable = ['name', 'phone', 'password', 'birthday', 'role', 'sex', 'start_date', 'address'];
    protected $table = 'employees';
    protected $hidden = ['remember_token', 'salary'];

    public function roles() {
        return $this->belongsToMany('App\Entities\Roles', 'role_employee', 'employee_id', 'roles_id');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles))
        {
            return count($this->roles()->whereIn('name', $roles)->get()) > 0;
        }
        else
        {
            $perms = explode(',', $roles);
            return count($this->roles()->whereIn('name', $perms)->get()) > 0;
        }
    }

}
