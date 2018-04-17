<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SearchRepository;
use App\Entities\Search;
use App\Validators\SearchValidator;

/**
 * Class SearchRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SearchRepositoryEloquent extends BaseRepository implements SearchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Search::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SearchValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
