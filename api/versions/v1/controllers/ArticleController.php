<?php

namespace api\versions\v1\controllers;

use api\versions\v1\presenters\ArticlePresenter;
use common\components\providers\PresenterDataProviderDecorator;
use common\models\Article;
use common\models\Author;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * Class ArticleController
 *
 * @package api\versions\v1\controllers
 */
class ArticleController extends Controller
{
    /**
     * @return PresenterDataProviderDecorator
     */
    public function actionIndex()
    {
        return new PresenterDataProviderDecorator(
            new ActiveDataProvider([
                'query' => Article::find()->published()->sorted(),
            ]),
            ArticlePresenter::class
        );
    }

    /**
     * @param int $authorId
     *
     * @return PresenterDataProviderDecorator
     * @throws NotFoundHttpException
     */
    public function actionIndexByAuthor(int $authorId)
    {
        $author = $this->findAuthor($authorId);

        return new PresenterDataProviderDecorator(
            new ActiveDataProvider([
                'query' => Article::find()->byAuthor($author)->published()->sorted(),
            ]),
            ArticlePresenter::class
        );
    }

    /**
     * @param int $id
     *
     * @return Author
     * @throws NotFoundHttpException
     */
    private function findAuthor(int $id): Author
    {
        $author = Author::findOne($id);

        if (empty($author)) {
            throw new NotFoundHttpException('Author not found');
        }

        return $author;
    }
}
