<?php

namespace Michcald\Validator\String;

class Url extends \Michcald\Validator\String
{
    public function validate($value)
    {
        $this->errors = array();
        
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            $this->errors[] = 'Must be a valid URL';
            return false;
        }
        
        return parent::validate($value);
    }
}
