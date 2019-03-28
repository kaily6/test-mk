<?php

namespace admin\controllers;

use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Class SiteController
 *
 * @package admin\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => Article::find()->sorted(),
            ]),
        ]);
    }
}
