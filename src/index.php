<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 16:12
 */
namespace NativePhp;
$rootPath = dirname(__DIR__);
require_once $rootPath . '/vendor/autoload.php';
require_once $rootPath . '/src/Utility/Core.php';

use NativePhp\Utility\Core;
use NativePhp\Utility\NewLetterMail;

//global variable
$globalConfigs = array();
Core::setRootPath($rootPath);
Core::init();

$mail = new NewLetterMail();
$mail->test();

var_dump($mail);



