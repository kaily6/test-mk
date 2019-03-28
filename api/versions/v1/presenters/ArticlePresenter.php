<?php

namespace api\versions\v1\presenters;

use common\models\Article;
use frostealth\yii2\presenter\Presenter;

/**
 * Class ArticlePresenter
 *
 * @property Article $entity
 *
 * @package api\versions\v1\presenters
 */
class ArticlePresenter extends Presenter
{
    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'short_description',
            'description',
            'author' => function (ArticlePresenter $presenter) {
                return new AuthorPresenter($presenter->entity->author);
            },
        ];
    }
}
