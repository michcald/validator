<?php

namespace Michcald\Validator;

class Date extends \Michcald\Validator
{
    private $format = 'Y-m-d';

    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    public function validate($value)
    {
        $this->errors = array();

        $info = date_parse_from_format($this->format, $value);

        if (isset($info['error_count']) && $info['error_count'] > 0) {
            $this->errors[] = array_shift($info['errors']);
            return false;
        }

        return true;
    }

}
