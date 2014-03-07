<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class StringLengthTest extends PHPUnit_Framework_TestCase
{
    public function testEqual()
    {
        $val = new Michcald\Validator\String\Length();
        $val->setEqual(5);
        
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qwerty'), false);
        
        $val->setEqual(0);
        
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate('qwert'), true);
    }
    
    public function testMax()
    {
        
    }
    
    public function testMin()
    {
        
    }
    
    public function testMinAndMax()
    {
        
    }
}
