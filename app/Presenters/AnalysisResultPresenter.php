<?php

namespace App\Presenters;

use App\Transformers\AnalysisResultTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AnalysisResultPresenter.
 *
 * @package namespace App\Presenters;
 */
class AnalysisResultPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AnalysisResultTransformer();
    }
}
