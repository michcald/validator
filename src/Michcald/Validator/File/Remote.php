<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Remote extends \Michcald\Validator
{
    public function validate($fileUrl)
    {
        $this->errors = array();
        
        $ch = curl_init($fileUrl);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($retcode != 200) {
            $this->errors[] = 'The remote file does not exist';
            return false;
        }
        
        return true;
    }
    
}
