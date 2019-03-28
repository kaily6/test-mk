<?php

namespace common\components\providers;

use yii\data\DataProviderInterface;

/**
 * Class PresenterDataProviderDecorator
 *
 * @package common\components\providers
 */
class PresenterDataProviderDecorator implements DataProviderInterface
{
    /** @var DataProviderInterface */
    private $_provider;

    /** @var string */
    private $_presenter;

    /**
     * PresenterActiveDataProviderDecorator constructor.
     *
     * @param DataProviderInterface $provider
     * @param string $presenterClassName
     */
    public function __construct(DataProviderInterface $provider, $presenterClassName)
    {
        $this->_provider = $provider;
        $this->_presenter = $presenterClassName;
    }

    /**
     * @inheritDoc
     */
    public function prepare($forcePrepare = false)
    {
        $this->_provider->prepare($forcePrepare);
    }

    /**
     * @inheritDoc
     */
    public function getCount()
    {
        return $this->_provider->getCount();
    }

    /**
     * @inheritDoc
     */
    public function getTotalCount()
    {
        return $this->_provider->getTotalCount();
    }

    /**
     * @inheritDoc
     */
    public function getKeys()
    {
        return $this->_provider->getKeys();
    }

    /**
     * @inheritDoc
     */
    public function getSort()
    {
        return $this->_provider->getSort();
    }

    /**
     * @inheritDoc
     */
    public function getPagination()
    {
        return $this->_provider->getPagination();
    }

    /**
     * @return array
     */
    public function getModels()
    {
        $originModels = $this->_provider->getModels();
        $presentedModels = [];
        foreach ($originModels as $key => $model) {
            $presentedModels[$key] = \Yii::createObject($this->_presenter, [$model]);
        }
        return $presentedModels;
    }
}
