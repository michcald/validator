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
        $this->max = (int)$length;
        
        return $this;
    }
    
    public function setMin($length)
    {
        $this->min = (int)$length;
        
        return $this;
    }
    
    public function validate($value)
    {
        if ($this->equal) {
            return strlen($value) == $this->equal;
        }
        
        if ($this->min && $this->max) {
            if (strlen($value) < $this->min || strlen($value) > $this->max) {
                $this->error = 'String length must be between ' . $this->min . 
                    ' and ' . $this->max;
                return false;
            }
        }
        
        if ($this->min && strlen($value) < $this->min) {
            $this->error = 'String length must be more than ' . $this->min;
            return false;
        }
        
        if ($this->max && strlen($value) > $this->max) {
            $this->error = 'String length must be lower than ' . $this->max;
            return false;
        }
        
        return true;
    }
    
    public function getError()
    {
        return $this->error;
    }
}
