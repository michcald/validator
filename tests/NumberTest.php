<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class NumberTest extends PHPUnit_Framework_TestCase
{
    public function testEqual()
    {
        $val = new Michcald\Validator\Number();
        $val->setEqual(2);
        
        $this->assertEquals($val->validate(2), true);
        $this->assertEquals($val->validate('2'), true);
        $this->assertEquals($val->validate(3), false);
        $this->assertEquals($val->validate(1), false);
        $this->assertEquals($val->validate(0), false);
    }
    
    public function testMin()
    {
        $val = new Michcald\Validator\Number();
        $val->setMin(2);
        
        $this->assertEquals($val->validate(2), true);
        $this->assertEquals($val->validate('2'), true);
        $this->assertEquals($val->validate(3), true);
        $this->assertEquals($val->validate(1), false);
        $this->assertEquals($val->validate(0), false);
    }
    
    public function testMax()
    {
        $val = new Michcald\Validator\Number();
        $val->setMax(5);
        
        $this->assertEquals($val->validate(2), true);
        $this->assertEquals($val->validate('2'), true);
        $this->assertEquals($val->validate(3), true);
        $this->assertEquals($val->validate(1), true);
        $this->assertEquals($val->validate(0), true);
        $this->assertEquals($val->validate(5), true);
        $this->assertEquals($val->validate(6), false);
    }
    
    public function testMaxAndMin()
    {
        $val = new Michcald\Validator\Number();
        $val->setMin(3)
            ->setMax(5);
        
        $this->assertEquals($val->validate(2), false);
        $this->assertEquals($val->validate('2'), false);
        $this->assertEquals($val->validate(3), true);
        $this->assertEquals($val->validate(1), false);
        $this->assertEquals($val->validate(0), false);
        $this->assertEquals($val->validate(5), true);
        $this->assertEquals($val->validate(6), false);
        $this->assertEquals($val->validate(4), true);
    }
}
