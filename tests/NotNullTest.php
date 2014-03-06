<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class NotNullTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\NotNull();
        
        $this->assertEquals($val->validate(null), false);
        
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate('  '), true);
        $this->assertEquals($val->validate('null'), true);
        
        $this->assertEquals($val->validate(0), true);
        $this->assertEquals($val->validate(1), true);
        $this->assertEquals($val->validate(-0), true);
    }
}
