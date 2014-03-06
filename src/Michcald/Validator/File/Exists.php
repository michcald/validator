<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Exists extends \Michcald\Validator
{
    public function validate($value)
    {
        $ch = curl_init($value);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $retcode == 200;
    }
    
    public function getError()
    {
        return 'The file does not exist';
    }
}
