<?php

namespace Michcald\Validator;

class Bool extends \Michcald\Validator
{
    public function validate($value)
    {
        $this->errors = array();
        
        if (!is_bool($value)) {
            $this->errors[] = 'Must be a boolean';
        }
        
        return count($this->errors) == 0;
    }
}
