<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class UrlTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $val = new \Michcald\Validator\String\Url();
        
        $this->assertEquals($val->validate('http://www.google.com'), true);
        $this->assertEquals($val->validate('http://www.google.com?hello-world'), true);
        $this->assertEquals($val->validate('http://www.google.'), false);
        $this->assertEquals($val->validate('http://www.google'), true);
        $this->assertEquals($val->validate('htp://www.google.com'), true);
        $this->assertEquals($val->validate('www.google.com'), false);
        $this->assertEquals($val->validate(''), false);
        $this->assertEquals($val->validate('http://'), false);
    }
}
