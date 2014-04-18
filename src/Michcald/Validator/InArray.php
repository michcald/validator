<?php

namespace Michcald\Validator;

class InArray extends \Michcald\Validator
{
    private $array = array();

    public function setArray(array $array)
    {
        $this->array = $array;

        return $this;
    }

    public function addToArray($value)
    {
        $this->array[] = $value;

        return $this;
    }

    public function validate($value)
    {
        $this->errors = array();

        if (!in_array($value, $this->array, true)) {
            $this->errors[] = 'Must be one of these (' . implode(',', $this->array) . ')';
            return false;
        }

        return true;
    }

}
