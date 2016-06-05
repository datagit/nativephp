<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 23:26
 */

namespace NativePhp\Utility;


class Service
{
    private $services = array();

    public function __construct()
    {
        $this->defineServices();
    }

    private function defineServices() {
        $this->services['mailer'] = new NewLetterMailerService();
        return $this;
    }

    public function get($id) {
        if (isset($this->services[$id])) {
            return $this->services[$id];
        }
        return null;

    }

}