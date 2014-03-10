<?php

namespace Michcald\Validator;

class NotNull extends \Michcald\Validator
{
    public function validate($value)
    {
        $this->errors = array();
        
        if ($value === '') {
            return true;
        }
        
        if (is_null($value)) {
            $this->errors[] = 'Must be not null';
        }
        
        return count($this->errors) == 0;
    }
}
