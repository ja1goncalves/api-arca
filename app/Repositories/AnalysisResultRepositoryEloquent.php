<?php

namespace App\Repositories;

use App\Presenters\AnalysisResultPresenter;
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
class AnalysisResultRepositoryEloquent extends AppRepository implements AnalysisResultRepository
{

    protected $fieldSearchable = [
        'id',
        'person_id'     => 'like',
        'search_id_old' => 'like',
        'search_id_new' => 'like',
        'person.name'   => 'like',
    ];

    /**
     * Regras para busca
     *
     * @var array
     */
    protected $fieldsRules = [
        'id'            => ['numeric', 'max:2147483647'],
        'person_id'     => ['numeric', 'max:2147483647'],
        'search_id_old' => ['numeric', 'max:2147483647'],
        'search_id_new' => ['numeric', 'max:2147483647'],
        'person.name'   => ['string', ],

    ];
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
     * @return mixed
     */
   public function presenter()
   {
       return AnalysisResultPresenter::class;
   }

}
