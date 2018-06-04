<?php

namespace App\Presenters;

use App\Transformers\PeopleInssTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PeopleInssPresenter.
 *
 * @package namespace App\Presenters;
 */
class PeopleInssPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PeopleInssTransformer();
    }
}
