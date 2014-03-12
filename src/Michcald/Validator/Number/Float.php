<?php

namespace Michcald\Validator\Number;

class Float extends \Michcald\Validator\Number
{
    public function validate($value)
    {
        $this->errors = array();
        
        $value = filter_var($value, FILTER_VALIDATE_FLOAT);
        
        if ($value === false) {
            $this->errors[] = 'Must be a float';
            return false;
        }
        
        return parent::validate($value);
    }
}
