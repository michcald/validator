<?php

namespace Michcald\Validator;

class Int extends \Michcald\Validator
{
    public function validate($value)
    {
        return is_int($value);
    }
    
    public function getError()
    {
        return 'Must be an integer';
    }
}
