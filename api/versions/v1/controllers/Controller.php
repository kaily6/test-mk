<?php

namespace api\versions\v1\controllers;

use frostealth\yii2\presenter\rest\Serializer;
use yii\rest\Controller as BaseController;
use Yii;

/**
 * Class Controller
 *
 * @package api\versions\v1\controllers
 */
abstract class Controller extends BaseController
{
    protected const VERSION = 'v1';

    /** @inheritdoc */
    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    /**
     * @inheritdoc
     */
    protected function verbs(): array
    {
        return [
            'create' => ['post'],
            'update' => ['put', 'patch'],
            'delete' => ['delete'],
            'index' => ['get', 'head'],
            'view' => ['get', 'head'],
        ];
    }
}
