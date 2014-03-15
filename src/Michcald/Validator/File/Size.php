<?php

namespace Michcald\Validator\File;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Size extends \Michcald\Validator\Number
{
    private $currencies = array(
        'B', // bytes
        'KB', // kilobytes
        'MB', // megabytes
        'GB', // gigabytes
        'TB'    // terabytes
    );
    private $currency = 'B';

    public function setCurrency($currency)
    {
        if (!in_array($currency, $this->currencies)) {
            throw new \Exception('Wrong unit of measure: ' . $currency);
        }

        $this->currency = $currency;

        return $this;
    }

    public function validate($filename)
    {
        $this->errors = array();

        if (!file_exists($filename)) {
            $this->errors[] = 'Must be a file';
            return false;
        }

        $filesize = filesize($filename); // in Bytes

        switch ($this->currency) {
            case 'KB':
                $filesize = $filesize / pow(1024, 1);
                break;
            case 'MB':
                $filesize = $filesize / pow(1024, 2);
                break;
            case 'GB':
                $filesize = $filesize / pow(1024, 3);
                break;
            case 'TB':
                $filesize = $filesize / pow(1024, 4);
                break;
        }

        return parent::validate($filesize);
    }

}
