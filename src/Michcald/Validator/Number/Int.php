<?php

namespace Michcald\Validator\Number;

class Int extends \Michcald\Validator\Number
{
    public function validate($value)
    {
        if (!is_int($value)) {
            $this->error = 'Must be an integer';
            return false;
        }
        
        return parent::validate($value);
    }
}
