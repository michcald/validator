<?php

namespace Michcald\Validator;

class NotEmpty extends \Michcald\Validator
{
    public function validate($value)
    {
        if (strlen($value) > 0) {
            return true;
        }
        
        return false;
    }

    public function getError()
    {
        return 'Must be not empty';
    }

}
