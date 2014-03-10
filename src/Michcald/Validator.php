<?php

namespace Michcald;

abstract class Validator
{
    protected $errors = array();
    
    abstract public function validate($value);
    
    final public function getErrors()
    {
        return $this->errors;
    }
}