<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Type extends \Michcald\Validator\InArray
{

    public function validate($filename)
    {
        $this->errors = array();

        if (!is_uploaded_file($filename) || !file_exists($filename)) {
            $this->errors[] = 'Must be a file';
            return false;
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($filename);

        return parent::validate($type);
    }

}
