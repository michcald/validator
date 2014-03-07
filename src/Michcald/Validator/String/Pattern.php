<?php

namespace Michcald\Validator\String;

class Pattern extends \Michcald\Validator
{
    private $regex;
    
    public function setRegex($regex)
    {
        $this->regex = $regex;
        
        return $this;
    }
    
    public function validate($value)
    {
        if (preg_match($this->regex , $value)) {
            return true;
        }
        
        return false;
    }
    
    public function getError()
    {
        return 'Must match the regex ' . $this->regex;
    }
}
