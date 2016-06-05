<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 18:16
 */

namespace NativePhp;
$rootPath = dirname(__DIR__);
require_once $rootPath . '/vendor/autoload.php';

try {
    spl_autoload_register(function ($class_name) {
        $names = explode('\\', $class_name);
        $file = dirname(__DIR__) . '/src/Utility/' . $names[count($names) - 1] . '.php';
        if (is_file($file)) {
            include_once $file;
        }

    });
} catch (\Exception $e2) {
    printf("Unable to parse the YAML string: %s", $e2->getMessage());
    die;
}



