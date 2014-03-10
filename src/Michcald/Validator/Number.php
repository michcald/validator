<?php

namespace Michcald\Validator;

class Number extends \Michcald\Validator
{
    private $max;
    
    private $min;
    
    private $equal;
    
    public function setMax($max)
    {
        $this->max = $max;
        
        return $this;
    }
    
    public function setMin($min)
    {
        $this->min = $min;
        
        return $this;
    }
    
    public function setEqual($equal)
    {
        $this->equal = $equal;
        
        return $this;
    }
    
    public function validate($value)
    {
        $this->errors = array();
        
        if (!is_numeric($value)) {
            
            $this->errors[] = 'Must be a number';
            
        } else {
            
            if ($this->equal !== null) {
                
                if ($value != $this->equal) {
                    $this->errors[] = 'Must be equal to ' . $this->equal;
                }
                
            } else {
                
                if ($this->max !== null && $value > $this->max) {
                    $this->error = 'Must be lower than ' . $this->max;
                    return false;
                }

                if ($this->min !== null && $value < $this->min) {
                    $this->error = 'Must be higher than ' . $this->min;
                    return false;
                }
            }
        }
        
        if (count($this->errors) > 0) {
            return false;
        }
        
        return true;
    }
}
