<?php

namespace Michcald\Validator;

class Bool extends \Michcald\Validator
{
    public function validate($value)
    {
        return is_bool($value);
    }
    
    public function getError()
    {
        return 'Must be a boolean';
    }
}
