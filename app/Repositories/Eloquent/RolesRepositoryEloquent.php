<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\RolesRepository;
use App\Entities\Roles;
use App\Validators\RolesValidator;

/**
 * Class RolesRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RolesRepositoryEloquent extends BaseRepository implements RolesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Roles::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
