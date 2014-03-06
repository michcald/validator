<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class SizeTest extends PHPUnit_Framework_TestCase
{
    private $file;
    
    public function setUp()
    {
        $_FILES = array(
            'test' => array(
                'name' => 'test.jpg',
                'type' => 'image/jpeg',
                'size' => 542,
                'tmp_name' => __DIR__ . '/_files/source-test.jpg', // deve esistere
                'error' => 0
            )
        );

        $this->file = $_FILES['test'];
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($_FILES);
        unset($this->file);
        @unlink(__DIR__ . '/_files/test.jpg');
    }

    public function testValidator()
    {
        
    }
}
