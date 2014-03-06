<?php

namespace Dummy\Core\Validator;

class FileTypeValidator extends AbstractValidator
{
    public function validate($value)
    {
        $name = $value['name'];
        $type = $value['type']; // image/jpeg
        $tmpName = $value['tmp_name'];
        $error = $value['error'];
        $size = $value['size'];
        
        if (isset($this->options['types'])) {
            $types = explode(',', $this->options['types']);
            
            $shortType = str_replace('image/', '', $type);
            
            if (!in_array($shortType, $types)) {
                return false;
            }
        }
        
        return true;
    }
    
    public function getError()
    {
        return 'The allowed file types are '. $this->options['types'];
    }
}
