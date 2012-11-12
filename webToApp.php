<?php
/**
 * Created by JetBrains PhpStorm.
 * User: micheal
 * Date: 11/2/12
 * Time: 4:19 AM
 * To change this template use File | Settings | File Templates.
 */

$input = $_POST['input'];

//append file path.
if(file_exists('Config.cfg') == true)
{
    $path = file_get_contents('Config.cfg');
    $output = $path . $_POST['output'];
}
else
{
    $output = getcwd() . $_POST['output'];
}


require_once 'GetInput.php';

    $UserIO = new getInput();

    $UserIO -> getUserinput($input, $output);

?>
<!DOCTYPE HTML >
<html>
<head>
    <title>Snippet Parser Web GUI</title>
    <LINK href="css/global.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="content">
    <div class="header">
        <p><h3>Snippet Parser Web GUI</h3></p>
    </div>
    <div class="form">
        <p>
            You Can now view your Output File Here, <?php echo '<a href="' . $output . '">' . $output . '</a>' ?>
            <br>
            <br>
            <a href="web-parser.php">Go Back</a>
        </p>
    </div>
</div>
</body>
</html>