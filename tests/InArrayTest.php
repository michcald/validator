<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class InArrayTest extends PHPUnit_Framework_TestCase
{
    private $array = array(
        'one',
        'two',
        'three'
    );
    
    public function testValidator()
    {
        $val = new Michcald\Validator\InArray();
        $val->setArray($this->array);
        
        $this->assertEquals($val->validate(null), false);
        $this->assertEquals($val->validate(''), false);
        
        $this->assertEquals($val->validate('one'), true);
        $this->assertEquals($val->validate('two'), true);
        $this->assertEquals($val->validate('three'), true);
        $this->assertEquals($val->validate('four'), false);
    }
}
