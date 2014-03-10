<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class FileRemoteTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $url = 'http://en.wikipedia.org/wiki/File:Lenna.png';
        $val = new Michcald\Validator\File\Remote();
        $this->assertEquals($val->validate($url), true);
        
        $url = 'http://en.wikipedia.org/wiki/File:Lenna2.png';
        $val = new Michcald\Validator\File\Remote();
        $this->assertEquals($val->validate($url), false);
    }
}
