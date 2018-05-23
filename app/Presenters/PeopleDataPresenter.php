<?php

namespace App\Presenters;

use App\Transformers\PeopleDataTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PeopleDataPresenter.
 *
 * @package namespace App\Presenters;
 */
class PeopleDataPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PeopleDataTransformer();
    }
}
