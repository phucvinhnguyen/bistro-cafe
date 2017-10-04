<?php

namespace App\Policies;

use App\Entities\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function access(Employee $user)
    {
        return $user->hasRole('admin') || $user->hasRole('manager');
    }

    public function update(Employee $user, $auth, $id)
    {
        return $auth->hasRole('admin') || $auth->id === intval($id);
    }
}