<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 17:23
 */

namespace NativePhp\Utility;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class NewLetterMail
{
    private $mailer = null;
    private $logger = null;

    public function __construct()
    {
        global $globalConfigs;
        $this->setMailer($globalConfigs['parameters']['mailer_transport']);
        $this->setLogger();
    }

    public function test() {
        $this->logger->warning('Foo');
        $this->logger->error('Bar');
    }

    public function setMailer($transport) {
        $this->mailer = new Mailer($transport);
    }

    public function setLogger() {
        global $globalConfigs;
        $path = Core::$rootPath . '/' . $globalConfigs['parameters']['path_log'];
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler($path . '/your.log', Logger::WARNING));
        $this->logger = $log;
    }
}