<?php

namespace Michcald\Validator\Number;

class Int extends \Michcald\Validator\Number
{

    public function validate($value)
    {
        $this->errors = array();
        
        if (is_string($value)) {
            $this->errors[] = 'Must be an integer';
            return false;
        }
        
        if (is_float($value)) {
            $this->errors[] = 'Must be an integer';
            return false;
        }
        
        $value = filter_var($value, FILTER_VALIDATE_INT);

        if ($value === false) {
            $this->errors[] = 'Must be an integer';
            return false;
        }

        return parent::validate($value);
    }

}
