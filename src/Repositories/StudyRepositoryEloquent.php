<?php

namespace Scool\Curriculum\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Scool\Curriculum\Repositories\StudyRepository;
use Scool\Curriculum\Entities\Study;
use Scool\Curriculum\Validators\StudyValidator;

/**
 * Class StudyRepositoryEloquent
 * @package namespace App\Repositories;
 */
class StudyRepositoryEloquent extends BaseRepository implements StudyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Study::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return StudyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
