<?php

namespace api\versions\v1\controllers;

use api\versions\v1\presenters\AuthorPresenter;
use common\components\providers\PresenterDataProviderDecorator;
use common\models\Author;
use yii\data\ActiveDataProvider;

/**
 * Class AuthorController
 *
 * @package api\versions\v1\controllers
 */
class AuthorController extends Controller
{
    /**
     * @return PresenterDataProviderDecorator
     */
    public function actionIndex()
    {
        return new PresenterDataProviderDecorator(
            new ActiveDataProvider([
                'query' => Author::find()->sortedByName(),
            ]),
            AuthorPresenter::class
        );
    }
}
