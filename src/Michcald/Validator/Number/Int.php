<?php

namespace Michcald\Validator\Number;

class Int extends \Michcald\Validator\Number
{
    public function validate($value)
    {
        $value = filter_var($value, FILTER_VALIDATE_INT);
        
        if ($value === false) {
            $this->errors[] = 'Must be an integer';
            return false;
        }
        
        return parent::validate($value);
    }
}
