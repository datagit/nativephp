<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 16:42
 */

namespace NativePhp\Utility;


class Mailer
{
    private $transport;

    public function __construct($transport)
    {
        $this->transport = $transport;
    }
}