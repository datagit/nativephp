<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 16:42
 */

namespace NativePhp\Utility;


class MailerWorker
{
    private $transport;

    public function __construct($transport)
    {
        $this->transport = $transport;
    }

    public function send() {
        echo "sending email...\n";
        return true;
    }
}