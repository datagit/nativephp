<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 18:16
 */

namespace NativePhp;
use NativePhp\Utility\Core;

$rootPath = dirname(__DIR__);
require_once $rootPath . '/vendor/autoload.php';
require_once $rootPath . '/src/Utility/Core.php';

try {
    Core::setRootPath($rootPath);
    Core::init();
} catch (\Exception $e2) {
    printf("Unable to load class: %s", $e2->getMessage());
    die;
}



