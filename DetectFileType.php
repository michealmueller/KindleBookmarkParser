<?php

/**
 * Description of getInput
 * Snippets Parser (For Kindle)
 * Author: Micheal Mueller
 *
 * Detects the type of input file, there are 2 types
 * 
 * Type 1: type one files have 10 = signs and have the book title/author(s)
 *           
 * listed first.
 *      
 * Type 2: type 2 files have 5 = signs and have the quote listed first.
 *
 * 
 */

require_once 'BufferManipulation.php';

class DetectFileType extends BufferManipulation
{
    protected $fileType;
    
    function setFileType()
    {
        $pattern = '/==========/';
        
        if (preg_match($pattern, $this -> bufferstring) == '1')
        {
            //set file type to Type 1
            $this -> fileType = '1';
        }
        else
        {
            //set file type Type 2
            $this -> fileType = '2';
        }

        parent::bufferStringToArray();
    }

}

?>
