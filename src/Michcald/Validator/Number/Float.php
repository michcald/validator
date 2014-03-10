<?php

namespace Michcald\Validator\Number;

class Float extends \Michcald\Validator\Number
{
    public function validate($value)
    {
        if (!is_float($value)) {
            $this->error = 'Must be a float';
            return false;
        }
        
        return parent::validate($value);
    }
}
