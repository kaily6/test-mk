<?php

namespace api\versions\v1\presenters;

use common\models\Author;
use frostealth\yii2\presenter\Presenter;

/**
 * Class AuthorPresenter
 *
 * @property Author $entity
 *
 * @package api\versions\v1\presenters
 */
class AuthorPresenter extends Presenter
{
    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'name',
            'rating',
        ];
    }
}
