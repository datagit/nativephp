<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 23:51
 */

namespace NativePhp\Tests;


use NativePhp\Utility\Core;

class MailerTest extends \PHPUnit_Framework_TestCase
{
    public function testMailer() {
        $services = Core::loadService();
        $this->assertEquals(true, $services->get('newlettermailer')->send());
    }

}