<?php

namespace App\Presenters;

use App\Transformers\SearchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SearchPresenter.
 *
 * @package namespace App\Presenters;
 */
class SearchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SearchTransformer();
    }
}
