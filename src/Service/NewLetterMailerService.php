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

class NewLetterMailerService
{
    private $mailer = null;
    private $logger = null;

    public function __construct()
    {
        $this->setMailer(Core::getParameterByKey('mailer_transport'));
        $this->setLogger();
    }

    public function send() {
        if ($this->mailer->send()) {
            $this->logger->warning('sent successful');
            return true;
        }
        $this->logger->error('send error');
        return false;

    }
        
    public function setMailer($transport) {
        $this->mailer = new MailerWorker($transport);
    }

    public function setLogger() {
        $path = Core::$rootPath . '/' . Core::getParameterByKey('path_log');
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler($path . '/your.log', Logger::WARNING));
        $this->logger = $log;
    }
}