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
    public static $config = null;
    public static $service = null;

    public static function setRootPath($path) {
        Core::$rootPath = $path;
    }

    public static function init() {
        Core::autoLoadClass();
        Core::loadConfig();
    }

    public static function loadService() {
        self::$service = new Service();
        return self::$service;
    }

    public static function loadConfig() {
        //load configs
        try {
            Core::$config = Yaml::parse(file_get_contents(Core::$rootPath . '/config/config.yml'));
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
                $filesInUtility = Core::$rootPath . '/src/Utility/' . $names[count($names) - 1] . '.php';
                if (is_file($filesInUtility)) {
                    include_once $filesInUtility;
                }
                $filesInService = Core::$rootPath . '/src/Service/' . $names[count($names) - 1] . '.php';
                if (is_file($filesInService)) {
                    include_once $filesInService;
                }
                $filesInTest = Core::$rootPath . '/tests/' . $names[count($names) - 1] . '.php';
                if (is_file($filesInTest)) {
                    include_once $filesInTest;
                }
            });
        } catch (\Exception $e2) {
            printf("Unable to load file: %s", $e2->getMessage());
            die;
        }
    }

    public static function getParameters() {
        return Core::$config['parameters'];
    }

    public static function getParameterByKey($key)
    {
        return Core::getParameters()[$key];
    }
}