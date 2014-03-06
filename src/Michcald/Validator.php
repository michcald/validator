<?php

namespace Michcald;

abstract class Validator
{
    abstract public function validate($value);
    
    abstract public function getError();
}