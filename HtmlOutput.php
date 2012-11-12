<?php

/**
 * Description of getInput
 * Snippets Parser (For Kindle)
 * Author: Micheal Mueller
 *
 */

class HtmlOutput 
{
    protected $bookCount;

    function createHTML()
    {

        $this -> bookCount = count($this -> titleArray) - 1;
        $htmlArray = array();
        for($i=0; $i <= $this -> bookCount; $i++)
        {
            $quotehtml = "<blockquote>" . str_replace("\n", "</blockquote>\n<blockquote>", $this -> quoteArray[$i]) . "</blockquote>\n";
            $htmlArray[$i] = "<h2>" . $this -> titleArray[$i] . "</h2>\n" .  $quotehtml . "<p>— " . $this -> authorArray[$i] . ", " . $this -> titleArray[$i] . ", " . $this -> locationArray[$i] . "</p>\n<br>\n<!---NEW BOOK-->\n";
        }
//convert to string
        $htmlArrayToString = implode($htmlArray);
//concat start html and end html to above
        $fullHTML = "<html>\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>\n<title>Kindle Parser Output.</title>\n</head>\n<body>" . $htmlArrayToString . "\n</body>\n</html>";
        //file_put_contents($this -> outputFile, $fullHTML);
        if (file_put_contents($this -> outputFile, $fullHTML) == false)
        {
            echo "ERROR: File Could Not Be Written Please Contact Author for Support..\n";
            echo './' .basename(__FILE__) . " OUTPUT_FILE_WRITE_ERROR\n\n";
            exit;
        }

    }
}

?>
