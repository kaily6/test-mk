<?php

$allowedIpPatterns = [
    '/^192\.168\.\d{1,3}\.\d{1,3}$/',
    '/^172\.[1-3][0-9]\.\d{1,3}\.\d{1,3}$/',
    '/127.0.0.1/',
];

$allowed = false;
foreach ($allowedIpPatterns as $regex) {
    $allowed |= preg_match($regex, $_SERVER['REMOTE_ADDR']);
}

if (!$allowed) {
    die($_SERVER['REMOTE_ADDR'].'You are not allowed to access this file.');
}

require(__DIR__ . '/../../vendor/autoload.php');

include '../../c3.php';

$c3routes = [
    '/c3/report/clover',
    '/c3/report/serialized',
    '/c3/report/html',
    '/c3/report/clear',
];
if (in_array($_SERVER['REQUEST_URI'], $c3routes)) {
    return;
}

(new \Dotenv\Dotenv(__DIR__ . '/../../', '.env.test'))->load();

if (getenv('REMOTE_TESTS_ALLOWED') !== 'true') {
    die('You are not allowed to access this file.');
}

require_once(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../config/main.php')
);

(new yii\web\Application($config))->run();
