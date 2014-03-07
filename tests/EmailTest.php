<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\Email();
        
        $this->assertEquals($val->validate('john@doe.com'), true);
        $this->assertEquals($val->validate('john@doe'), false);
        $this->assertEquals($val->validate('john doe@doe.com'), false);
        $this->assertEquals($val->validate('john@doe.co.uk'), true);
        $this->assertEquals($val->validate('john.doe.com'), false);
        $this->assertEquals($val->validate(''), false);
        $this->assertEquals($val->validate('@'), false);
    }
}
