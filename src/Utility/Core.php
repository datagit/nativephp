<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 17:37
 */

namespace NativePhp\Utility;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;


class Core
{
    public static $rootPath = null;
    public static function setRootPath($path) {
        Core::$rootPath = $path;
    }

    public static function init() {
        Core::autoLoadClass();
        Core::loadConfig();

    }

    public static function loadConfig() {
        //load configs
        try {
            global $globalConfigs;
            $globalConfigs = Yaml::parse(file_get_contents(Core::$rootPath . '/config/config.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
            die;
        }
    }

    public static function autoLoadClass() {
        //load classes
        try {
            spl_autoload_register(function ($class_name) {
                $names = explode('\\', $class_name);
                include Core::$rootPath . '/src/Utility/' . $names[count($names) - 1] . '.php';
            });
        } catch (\Exception $e2) {
            printf("Unable to parse the YAML string: %s", $e2->getMessage());
            die;
        }
    }
}