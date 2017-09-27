<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Roles extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];
    protected $table = 'roles';

    public function users() {
        return $this->belongsToMany('App\Entities\Employee', 'role_employee', 'employee_id', 'roles_id');
    }
}
