<?php

namespace Michcald\Validator;

class Email extends \Michcald\Validator
{
    public function validate($value)
    {
        $regex = '/^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})/';

        return preg_match($regex , $value);
    }
    
    public function getError()
    {
        return 'Must be a valid email address';
    }
}