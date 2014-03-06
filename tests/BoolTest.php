<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class BoolTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\Bool();
        
        $this->assertEquals($val->validate(0), false);
        $this->assertEquals($val->validate(false), true);
        
        $this->assertEquals($val->validate(true), true);
        $this->assertEquals($val->validate(1), false);
        
        $this->assertEquals($val->validate(2), false);
        $this->assertEquals($val->validate(15), false);
        
        $this->assertEquals($val->validate(-1), false);
        
        $this->assertEquals($val->validate('true'), false);
        $this->assertEquals($val->validate('false'), false);
    }
}
