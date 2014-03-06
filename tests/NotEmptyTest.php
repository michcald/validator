<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class NotEmptyTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\NotEmpty();
        
        $this->assertEquals($val->validate(null), false);
        $this->assertEquals($val->validate(''), false);
        
        $this->assertEquals($val->validate('  '), true);
        $this->assertEquals($val->validate('null'), true);
        
        $this->assertEquals($val->validate(0), true);
        $this->assertEquals($val->validate(1), true);
        $this->assertEquals($val->validate(-0), true);
    }
}
