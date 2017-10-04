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
        return $this->hasMany('App\Entities\Employee', 'id');
    }

    public function hasRole(string $role)
    {
        return $this->name === $role ?? false;
    }
}
