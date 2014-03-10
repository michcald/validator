<?php

namespace Michcald\Validator;

class NotEmpty extends \Michcald\Validator
{
    public function validate($value)
    {
        $this->errors = array();
        
        if (strlen($value) == 0) {
            $this->errors[] = 'Must be not empty';
        }
        
        return count($this->errors) == 0;
    }

}
