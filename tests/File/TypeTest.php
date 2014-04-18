<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class FileTypeTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new Michcald\Validator\File\Type();
        $val->setArray(array(
            'text/x-c++', // PHP content type
            'image/jpeg',
            'image/jpg',
        ));

        $this->assertEquals($val->validate(__FILE__), true);
        
        $val = new Michcald\Validator\File\Type();
        $val->setArray(array(
            'image/jpeg',
            'image/jpg'
        ));
        
        $this->assertEquals($val->validate(__FILE__), false);
    }
}
