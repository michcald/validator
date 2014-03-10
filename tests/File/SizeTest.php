<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class FileSizeTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\File\Size();
        $val->setMax(5)
            ->setCurrency('MB');
        $this->assertEquals($val->validate(__FILE__), true);
        
        $val = new Michcald\Validator\File\Size();
        $val->setMin(5)
            ->setCurrency('MB');
        $this->assertEquals($val->validate(__FILE__), false);
        
        $val = new Michcald\Validator\File\Size();
        $val->setMax(1)
            ->setCurrency('MB');
        $this->assertEquals($val->validate(__FILE__), true);
        
        $val = new Michcald\Validator\File\Size();
        $val->setMax(1024)
            ->setCurrency('B');
        $this->assertEquals($val->validate(__FILE__), true);
    }
}
