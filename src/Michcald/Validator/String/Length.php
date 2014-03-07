<?php

namespace Michcald\Validator\String;

class Length extends \Michcald\Validator
{
    private $error;
    
    private $equal;
    
    private $max;
    
    private $min;
    
    public function setEqual($length)
    {
        $this->equal = (int)$length;
        
        return $this;
    }
    
    public function setMax($length)
    {
        $length = (int)$length;
        
        if ($length < 0) {
            $length = 0;
        }
        
        $this->max = $length;
        
        return $this;
    }
    
    public function setMin($length)
    {
        $length = (int)$length;
        
        if ($length < 0) {
            $length = 0;
        }
        
        $this->min = $length;
        
        return $this;
    }
    
    public function validate($value)
    {
        if ($this->equal !== null) {
            return strlen($value) == $this->equal;
        }
        
        if ($this->max !== null && strlen($value) > $this->max) {
            $this->error = 'String length must be lower than ' . $this->max;
            return false;
        }
        
        if ($this->min !== null && strlen($value) < $this->min) {
            $this->error = 'String length must be higher than ' . $this->min;
            return false;
        }
        
        return true;
    }
    
    public function getError()
    {
        return $this->error;
    }
}
