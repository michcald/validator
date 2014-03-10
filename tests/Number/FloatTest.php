<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class FloatTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new \Michcald\Validator\Number\Float();
        
        $this->assertEquals($val->validate(0), false);
        $this->assertEquals($val->validate(1), false);
        $this->assertEquals($val->validate(2), false);
        $this->assertEquals($val->validate(15), false);
        $this->assertEquals($val->validate(20), false);
        $this->assertEquals($val->validate(82374), false);
        $this->assertEquals($val->validate(-1), false);
        $this->assertEquals($val->validate(-2), false);
        $this->assertEquals($val->validate(-5), false);
        $this->assertEquals($val->validate(-0), false);
        
        $this->assertEquals($val->validate('0'), false);
        $this->assertEquals($val->validate('1'), false);
        $this->assertEquals($val->validate('-2'), false);
        
        $this->assertEquals($val->validate(0.1), true);
        $this->assertEquals($val->validate(0.2), true);
        $this->assertEquals($val->validate(-0.1), true);
        $this->assertEquals($val->validate(-0.2), true);
        $this->assertEquals($val->validate(0.0), true);
        
        $this->assertEquals($val->validate('0a'), false);
        $this->assertEquals($val->validate('1d'), false);
        $this->assertEquals($val->validate('ewr'), false);
    }
}
