<?php
/**
 * Description of getInput
 * Snippets Parser (For Kindle)
 * Author: Micheal Mueller
 *
 */
require_once 'DetectFileType.php';

class FileWork extends DetectFileType
{
    private $filename;
    protected $bufferstring;

    protected function reader()
    {

        $this -> filename = $this -> inputFile;

        $this -> bufferstring = file_get_contents($this -> filename);

        parent::setFileType();
    }
}
?>
