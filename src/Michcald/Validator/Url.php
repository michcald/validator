<?php

namespace Michcald\Validator;

class Url extends \Michcald\Validator
{
    public function validate($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        
        return true;
    }
    
    public function getError()
    {
        return 'Must be a valid URL';
    }
}
