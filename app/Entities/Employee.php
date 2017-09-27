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

    protected $fillable = ['name', 'phone', 'password', 'birthday', 'role', 'sex', 'start_date'];
    protected $table = 'employees';
    protected $hidden = ['remember_token', 'salary'];

    public function roles() {
        return $this->belongsToMany('App\Entities\Roles', 'role_employee', 'employee_id', 'roles_id');
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($role))
            return true;
        abort(401, 'Unauthorized.');
    }

    public function hasRole($role)
    {
        return count($this->roles()->find($role)) > 0;
    }

    public function hasAnyRole($roles)
    {
        if (count($roles) > 0)
        {
            $authRole = $this->roles()->whereIn('id', $roles)->get();
            if (count($authRole) > 0)
                return true;
        }
        return false;
    }

}
