<?php

namespace pagfacu\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use pagfacu\Repositories\UserRepository;
use pagfacu\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace pagfacu\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * get deliverman
     */

    public function getdeliveryman()
    {
        return $this->model->where(['role'=>'deliveryman'])->lists('name','id');

    }

}
