<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class AlphaTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\Alpha();
        
        $this->assertEquals($val->validate('qwerty'), true);
        $this->assertEquals($val->validate('q'), true);
        $this->assertEquals($val->validate(''), true);
        
        $this->assertEquals($val->validate('q32'), false);
    }
}
