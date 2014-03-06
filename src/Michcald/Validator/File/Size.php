<?php

namespace Dummy\Core\Validator;

class FileSizeValidator extends AbstractValidator
{
    public function validate($value)
    {
        $name = $value['name'];
        $type = $value['type']; // image/jpeg
        $tmpName = $value['tmp_name'];
        $error = $value['error'];
        $size = $value['size'];
        
        $sizeInMb = $size / 1024 / 1024;
        
        if (isset($this->options['max'])) {
            if ($sizeInMb > $this->options['max']) {
                return false;
            }
        }
        
        if (isset($this->options['min'])) {
            if ($sizeInMb < $this->options['min']) {
                return false;
            }
        }
        
        return true;
    }
    
    public function getError()
    {
        $str = 'The file size must be ';
        
        if (isset($this->options['min'])) {
            $str .= ' minimum ' . $this->options['min'] . 'MB and ';
        }
        
        if (isset($this->options['max'])) {
            $str .= ' maximum ' . $this->options['max'] . 'MB';
        }
        
        return $str;
    }
}
