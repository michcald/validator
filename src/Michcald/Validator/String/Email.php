<?php

namespace Michcald\Validator\String;

class Email extends \Michcald\Validator\String
{

    public function validate($value)
    {
        $this->errors = array();

        $regex = '/^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})/';

        if (!preg_match($regex, $value)) {
            $this->errors[] = 'Must be a valid email address';
            return false;
        }

        return parent::validate($value);
    }

}
