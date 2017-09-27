<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\RoleEmployeeRepository;
use App\Entities\RoleEmployee;
use App\Validators\RoleEmployeeValidator;

/**
 * Class RoleEmployeeRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RoleEmployeeRepositoryEloquent extends BaseRepository implements RoleEmployeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoleEmployee::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
