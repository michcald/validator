<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class DateTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\Date();
        $val->setFormat('Y-m-d');
        $this->assertEquals($val->validate(date('Y-m-d')), true);
        $this->assertEquals($val->validate('2014-03-07'), true);
        $this->assertEquals($val->validate('2014-02-30'), true);
        $this->assertEquals($val->validate(date('Y/m/d')), false);
        $this->assertEquals($val->validate('11031987'), false);
        $this->assertEquals($val->validate('ciao'), false);
        
        $val = new Michcald\Validator\Date();
        $val->setFormat('Y/m/d');
        $this->assertEquals($val->validate(date('Y-m-d')), false);
        $this->assertEquals($val->validate(date('Y/m/d')), true);
        $this->assertEquals($val->validate('11031987'), false);
        $this->assertEquals($val->validate('ciao'), false);
        
        $val = new Michcald\Validator\Date();
        $val->setFormat('d-m-Y');
        $this->assertEquals($val->validate(date('d-m-Y')), true);
        $this->assertEquals($val->validate(date('Y/m/d')), false);
        $this->assertEquals($val->validate(date('d/m/Y')), false);
        
        $val = new Michcald\Validator\Date();
        $val->setFormat('d m, Y');
        $this->assertEquals($val->validate(date('d m, Y')), true);
        $this->assertEquals($val->validate('7 3, 2005'), true);
    }
}
