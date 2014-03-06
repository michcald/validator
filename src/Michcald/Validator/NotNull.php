<?php

namespace Michcald\Validator;

class NotNull extends \Michcald\Validator
{
    public function validate($value)
    {
        if ($value === '') {
            return true;
        }
        
        return !is_null($value);
    }

    public function getError()
    {
        return 'Must be not null';
    }

}
