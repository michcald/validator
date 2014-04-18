<?php

namespace Michcald\Validator\Number;

class Float extends \Michcald\Validator\Number
{

    public function validate($value)
    {
        $this->errors = array();

        if (is_string($value)) {
            $this->errors[] = 'Must be a float';
            return false;
        }
        
        if (is_int($value)) {
            $this->errors[] = 'Must be a float';
            return false;
        }
        
        $value = filter_var($value, FILTER_VALIDATE_FLOAT);

        if ($value === false) {
            $this->errors[] = 'Must be a float';
            return false;
        }

        return parent::validate($value);
    }

}
