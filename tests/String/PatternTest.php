<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class StringPatternTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\String\Pattern();
        $val->setRegex('/\[\d\]/');
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), false);
        $this->assertEquals($val->validate('4[]'), false);
        $this->assertEquals($val->validate('ciao'), false);
        
        $val = new Michcald\Validator\String\Pattern();
        $val->setRegex('/\[\d*\]/');
        $this->assertEquals($val->validate('[]'), true);
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), true);
        
        $val = new Michcald\Validator\String\Pattern();
        $val->setRegex('/\[\d+\]/');
        $this->assertEquals($val->validate('[]'), false);
        $this->assertEquals($val->validate('[4]'), true);
        $this->assertEquals($val->validate('[44]'), true);
    }
}
