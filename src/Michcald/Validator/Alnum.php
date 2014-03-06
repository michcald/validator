<?php

namespace Michcald\Validator;

class Alnum extends \Michcald\Validator
{
    private $allowWhiteSpaces = true;
    
    public function setAllowWhiteSpaces($allowWhiteSpaces)
    {
        $this->allowWhiteSpaces = (bool)$allowWhiteSpaces;
        
        return $this;
    }
    
    public function validate($value)
    {
        $regex = $this->allowWhiteSpaces ? '/^[a-zA-Z0-9\s]*$/' : '/^[a-zA-Z0-9]*$/';

        return preg_match($regex , $value);
    }
    
    public function getError()
    {
        return 'Must contains only letters and numbers';
    }
}
