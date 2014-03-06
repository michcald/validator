<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Type extends \Michcald\Validator
{
    private $types = array();
    
    public function addType($type)
    {
        $this->types[] = $type;
        
        return $this;
    }
    
    public function validate($value)
    {
        if (!isset($value['type'])) {
            return false;
        }
        
        return in_array($value['type'], $this->types);
    }
    
    public function getError()
    {
        if (count($this->types) == 0) {
            return 'No types allowed';
        }
        
        if (count($this->types) == 1) {
            return 'The allowed file type is '. array_shift($this->types);
        }
        
        return 'The allowed file types are '. implode(', ', $this->types);
    }
}
