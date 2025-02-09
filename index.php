<?php
error_reporting(-1);
ini_set('display_errors', true);

$timeStart = microtime();
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('APPATH', ROOTPATH .'Application'. DIRECTORY_SEPARATOR);
define('CONF', ROOTPATH .'Application'. DIRECTORY_SEPARATOR.'Cache'. DIRECTORY_SEPARATOR.'ClassCache'. DIRECTORY_SEPARATOR);
session_start();
/** Автозагрузка классов **/
require_once ROOTPATH .'/System/Engine/ClassLoader.php';
$loader = new System\Engine\ClassLoader(ROOTPATH);
$loader->withPath('Psr\\', '\System\Library\Psr\\');
//$loader->withPath('ReCaptcha\\', '\System\Library\ReCaptcha\\');
$loader->withPath('Fig\\', '\System\Library\Fig\\');
$loader->register();
/** Иницилизируем ядро  **/
$core = new System\Engine\Core([
    'timeStart' => $timeStart
]);
$core->handle($core->request->getUri());
