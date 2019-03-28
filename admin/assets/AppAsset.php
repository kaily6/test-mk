<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @package admin\assets
 */
class AppAsset extends AssetBundle
{
    /** @var string */
    public $basePath = '@webroot';

    /** @var string */
    public $baseUrl = '@web';

    /** @var array */
    public $css = [];

    /** @var array */
    public $js = [];

    /** @var array */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
