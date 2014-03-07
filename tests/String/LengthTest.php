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
        
        $val = new Michcald\Validator\String\Length();
        $val->setEqual(0);
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate('qwert'), false);
    }
    
    public function testMax()
    {
        $val = new Michcald\Validator\String\Length();
        $val->setMax(4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qwer'), true);
        $this->assertEquals($val->validate('qw'), true);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMax(0);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate(''), true);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMax(-4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate(''), true);
    }
    
    public function testMin()
    {
        $val = new Michcald\Validator\String\Length();
        $val->setMin(4);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate('qwer'), true);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMin(0);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate(''), true);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMin(-4);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate(''), true);
    }
    
    public function testMinAndMax()
    {
        $val = new Michcald\Validator\String\Length();
        $val->setMin(4)
            ->setMax(1);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate(''), false);
        $this->assertEquals($val->validate('qwer'), false);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMin(4)
            ->setMax(4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate('qwer'), true);
        
        $val = new Michcald\Validator\String\Length();
        $val->setMin(2)
            ->setMax(5);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate('qwer'), true);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('q'), false);
        $this->assertEquals($val->validate('qwerty'), false);
    }
}
