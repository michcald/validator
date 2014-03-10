<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class StringTest extends PHPUnit_Framework_TestCase
{
    public function testLengthEqual()
    {
        $val = new Michcald\Validator\String();
        $val->setEqual(5);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qwerty'), false);
        
        $val = new Michcald\Validator\String();
        $val->setEqual(0);
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate('qwert'), false);
    }
    
    public function testLengthMax()
    {
        $val = new Michcald\Validator\String();
        $val->setMax(4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qwer'), true);
        $this->assertEquals($val->validate('qw'), true);
        
        $val = new Michcald\Validator\String();
        $val->setMax(0);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate(''), true);
        
        $val = new Michcald\Validator\String();
        $val->setMax(-4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate(''), true);
    }
    
    public function testLengthMin()
    {
        $val = new Michcald\Validator\String();
        $val->setMin(4);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate('qwer'), true);
        
        $val = new Michcald\Validator\String();
        $val->setMin(0);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate(''), true);
        
        $val = new Michcald\Validator\String();
        $val->setMin(-4);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate(''), true);
    }
    
    public function testLengthMinAndMax()
    {
        $val = new Michcald\Validator\String();
        $val->setMin(4)
            ->setMax(1);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate(''), false);
        $this->assertEquals($val->validate('qwer'), false);
        
        $val = new Michcald\Validator\String();
        $val->setMin(4)
            ->setMax(4);
        $this->assertEquals($val->validate('qwert'), false);
        $this->assertEquals($val->validate('qw'), false);
        $this->assertEquals($val->validate('qwer'), true);
        
        $val = new Michcald\Validator\String();
        $val->setMin(2)
            ->setMax(5);
        $this->assertEquals($val->validate('qw'), true);
        $this->assertEquals($val->validate('qwer'), true);
        $this->assertEquals($val->validate('qwert'), true);
        $this->assertEquals($val->validate('q'), false);
        $this->assertEquals($val->validate('qwerty'), false);
    }
    
    public function testRegex()
    {
        $val = new Michcald\Validator\String();
        $val->setRegex('\[\d\]');
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), false);
        $this->assertEquals($val->validate('4[]'), false);
        $this->assertEquals($val->validate('ciao'), false);
        
        $val = new Michcald\Validator\String();
        $val->setRegex('\[\d*\]');
        $this->assertEquals($val->validate('[]'), true);
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), true);
        
        $val = new Michcald\Validator\String();
        $val->setRegex('\[\d+\]');
        $this->assertEquals($val->validate('[]'), false);
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), true);
    }
    
    public function testAlnum()
    {
        $val = new Michcald\Validator\String();
        $val->setRegex('^[a-zA-Z0-9]*$');
        
        $this->assertEquals($val->validate('qwerty'), true);
        $this->assertEquals($val->validate('q'), true);
        $this->assertEquals($val->validate(''), true);
        $this->assertEquals($val->validate('q32'), true);
        $this->assertEquals($val->validate('2'), true);
        $this->assertEquals($val->validate(2), false);
    }
    
    public function testAlpha()
    {
        $val = new Michcald\Validator\String();
        $val->setRegex('^[a-zA-Z]*$');
        
        $this->assertEquals($val->validate('qwerty'), true);
        $this->assertEquals($val->validate('q'), true);
        $this->assertEquals($val->validate(''), true);
        
        $this->assertEquals($val->validate('q32'), false);
        $this->assertEquals($val->validate('2'), false);
        $this->assertEquals($val->validate(2), false);
    }
}
