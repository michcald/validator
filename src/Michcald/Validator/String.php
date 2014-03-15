<?php

namespace Michcald\Validator;

class String extends \Michcald\Validator
{
    private $equal;
    private $max;
    private $min;
    private $regex;

    public function setEqual($length)
    {
        $this->equal = (int) $length;

        return $this;
    }

    public function setMax($length)
    {
        $length = (int) $length;

        if ($length < 0) {
            $length = 0;
        }

        $this->max = $length;

        return $this;
    }

    public function setMin($length)
    {
        $length = (int) $length;

        if ($length < 0) {
            $length = 0;
        }

        $this->min = $length;

        return $this;
    }

    public function setRegex($regex)
    {
        $this->regex = $regex;

        return $this;
    }

    public function validate($value)
    {
        $this->errors = array();

        if (!is_string($value)) {

            $this->errors[] = 'Must be a string';
        } else {

            if ($this->regex !== null) {
                if (!preg_match('%' . $this->regex . '%', $value)) {
                    $this->errors[] = 'Must match this pattern ' . $this->regex;
                }
            }

            if ($this->equal !== null) {

                if (strlen($value) != $this->equal) {
                    $this->errors[] = 'String length must be ' . $this->equal;
                }
            } else {

                if ($this->max !== null && strlen($value) > $this->max) {
                    $this->errors[] = 'String length must be lower than ' . $this->max;
                }

                if ($this->min !== null && strlen($value) < $this->min) {
                    $this->errors[] = 'String length must be higher than ' . $this->min;
                }
            }
        }

        if (count($this->errors) > 0) {
            return false;
        }

        return true;
    }

}
