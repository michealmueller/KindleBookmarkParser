<?php

/**
 * Description of getInput
 * Snippets Parser (For Kindle)
 * Author: Micheal Mueller
 *
 */
require_once 'FileWork.php';

class GetInput extends FileWork
{

    protected $inputFile;
    protected $outputFile;

    //get user input from console using argv
    public function getUserinput($snippetFile, $htmlOutput)
    {

      $this -> inputFile = $snippetFile;  //set user input to variable.
      $this -> outputFile = $htmlOutput;  //set user chosen output file.

      parent::reader();
    }
}

?>
