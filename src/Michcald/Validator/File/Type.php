<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Type extends \Michcald\Validator\InArray
{
    public function validate($filename)
    {
        if (!file_exists($filename)) {
            $this->error = 'Must be a file';
            return false;
        }
        
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($filename);
        
        return parent::validate($type);
    }
}

