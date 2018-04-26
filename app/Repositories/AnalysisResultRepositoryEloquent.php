<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Analysis_resultRepository;
use App\Entities\AnalysisResult;
use App\Validators\AnalysisResultValidator;

/**
 * Class AnalysisResultRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AnalysisResultRepositoryEloquent extends BaseRepository implements AnalysisResultRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AnalysisResult::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AnalysisResultValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
