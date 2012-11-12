<?php
	require_once 'configWork.php';

	$configWork = new configWork();

	$configWork -> detectConfig();

?>
<!DOCTYPE HTML >
<html>
<head>
    <title>Snippet Parser Web GUI</title>
    <LINK href="css/global.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="content" class="shadow">
    <div class="header">
        <p>
            <h3>Snippet Parser Web GUI</h3>
            <ol type="none">
                <li>First Choose the Input File</li>
                <li>Type in the output file name, i.e test.html</li>
                <li>Click submit, if you did not set the static location then the file will be placed in the same directory as the script.</li>
            </ol>
        </p>
    </div>
    <div class="warnin-msg">
        <p>
            <b>Be SURE you have read/write access to the directory you select to store the HTML files in.</b>
            <br>
            <?php
                if($configWork->detectConfig() == false)
                {
                    echo 'The config file has not been created, so the file will be saved in the current working directory(' . getcwd() .'), if you do not want this please set the directory on the right.';
                }
            ?>
        </p>
    </div>
    <div class="uploadForm">
        <form action="webToApp.php" method="post">
            <table align="center">
                <tr>
                    <td>Snippet File:</td>
                </tr>
                <tr>
                    <td><input type="file" name="input" value="Browse" /></td>
                </tr>
                <tr>
                    <td>Output File:</td>
                </tr>
                <tr>
                    <td class="filepath">
                    	<?php
                    		$configWork -> detectConfig();
	                      	echo $configWork -> savedDir;
                        ?>
                    </td>
                </tr>
                <tr>
                	<td><input type="text" name="output"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Submit" ></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="settings">
        <form action="saveLoc.php" method="post">
            <table>
                <tr>
                    <td>If you would like to set a static location to put all the HTML output files,<br> Do so below. be sure to add the trailing / or \ system depending of course</td>
                </tr>
                <tr>
                    <td><input class="inputtext" type="text" name="static" value="<?php if(file_exists('Config.cfg')) { $path=file_get_contents('Config.cfg'); echo $path;}else{echo getcwd();}?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="setDir" value="Save" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>