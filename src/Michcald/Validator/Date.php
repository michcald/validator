<?php

namespace Michcald\Validator;

class Date extends \Michcald\Validator
{
    public function validate($value)
    {
        $day = date('d', strtotime($value));
        $month = date('m', strtotime($value));
        $year = date('Y', strtotime($value));
        
        return checkdate($month, $day, $year);
    }
    
    public function getError()
    {
        return 'Must be a valid date YYYY-MM-DD';
    }
}
