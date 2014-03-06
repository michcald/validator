<?php

namespace Michcald\Validator;

class Url extends \Michcald\Validator
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
    
    public function getError()
    {
        return 'Must be a valid URL';
    }
}
