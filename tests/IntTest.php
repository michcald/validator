<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class IntTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\Int();
        
        $this->assertEquals($val->validate(0), true);
        $this->assertEquals($val->validate(1), true);
        $this->assertEquals($val->validate(2), true);
        $this->assertEquals($val->validate(15), true);
        $this->assertEquals($val->validate(20), true);
        $this->assertEquals($val->validate(82374), true);
        $this->assertEquals($val->validate(-1), true);
        $this->assertEquals($val->validate(-2), true);
        $this->assertEquals($val->validate(-5), true);
        $this->assertEquals($val->validate(-0), true);
        
        $this->assertEquals($val->validate('0'), false);
        $this->assertEquals($val->validate('1'), false);
        $this->assertEquals($val->validate('-2'), false);
        
        $this->assertEquals($val->validate(0.1), false);
        $this->assertEquals($val->validate(0.2), false);
        $this->assertEquals($val->validate(-0.1), false);
        $this->assertEquals($val->validate(-0.2), false);
        $this->assertEquals($val->validate(0.0), false);
        
        $this->assertEquals($val->validate('0a'), false);
        $this->assertEquals($val->validate('1d'), false);
        $this->assertEquals($val->validate('ewr'), false);
    }
}
