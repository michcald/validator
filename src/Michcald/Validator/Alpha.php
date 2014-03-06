<?php

namespace Michcald\Validator;

class Alpha extends \Michcald\Validator
{
    private $allowWhiteSpaces = true;
    
    public function setAllowWhiteSpaces($allowWhiteSpaces)
    {
        $this->allowWhiteSpaces = (bool)$allowWhiteSpaces;
        
        return $this;
    }
    
    public function validate($value)
    {
        $regex = $this->allowWhiteSpaces ? '/^[a-zA-Z\s]*$/' : '/^[a-zA-Z]*$/';

        return preg_match($regex , $value);
    }
    
    public function getError()
    {
        return 'Must contains only letters';
    }
}
