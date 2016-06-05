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

Core::setRootPath($rootPath);
Core::init();

$service = Core::loadService();

//var_dump($service->get('mailer'));
$service->get('newlettermailer')->send();



