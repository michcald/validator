<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Size extends \Michcald\Validator
{
    private $max;
    
    public function setMax($max)
    {
        $this->max = (int)$max;
        
        return $this;
    }
    
    public function validate($value)
    {
        if (!isset($value['size'])) {
            return false;
        }
        
        if ($this->max && $value['size'] > $this->max) {
            return false;
        }
        
        return true;
    }
    
    public function getError()
    {
        return 'The file size must be lower than ' . $this->max . ' bytes';
    }
}
