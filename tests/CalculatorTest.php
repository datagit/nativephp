<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 05/06/2016
 * Time: 18:04
 */

namespace NativePhp\Tests;


//https://phpunit.de/getting-started.html

use NativePhp\Utility\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculator() {
        $cal = new Calculator();
        $this->assertEquals(3, $cal->add(1, 2));
        //phpunit --bootstrap src/autoload.php tests/MoneyTest
    }
}