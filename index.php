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
    <LINK href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content">
    <div class="page-header">
         <h3>Snippet Parser Web GUI</h3>
                1.First Choose the Input File<br />
                2.Type in the output file name, i.e test.html<br />
                3.Click submit, if you did not set the static location then the file will be placed in the same directory as the script.<br />
    </div>
    <div class="text-danger text-center">
        <b>Be SURE you have read/write access to the directory you select to store the HTML files in.</b>
            <br>
            <?php
                if($configWork->detectConfig() == false)
                {
                    echo 'The config file has not been created, so the file will be saved in the current working directory(' . getcwd() .'), if you do not want this please set the directory on the right.';
                }
            ?>
    </div>
    <div class="modal-content content">
        <div class="pull-left">
                <form action="webToApp.php" method="post" class="form-inline">
                <table class="table">
                    <tr>
                        <td><label for="input" >Snippet File:</label></td>
                    </tr>
                    <tr>
                        <td><input class="form-control btn-default btn-mini" type="file" name="input" value="Browse" /></td>
                    </tr>
                    <tr>
                        <td><label for="output">Output File:</label></td>
                    </tr>
                    <tr>
                        <td class="filepath">
                            <?php
                                $configWork -> detectConfig();
                                echo $configWork -> savedDir.'/';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-small" type="text" name="output" placeholder="Enter File Name"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-primary btn-small" type="submit" name="submit" value="Submit" ></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="pull-right">
               <form action="saveLoc.php" method="post">
                <table class="table">
                    <tr>
                        <td><label for="static" >If you would like to set a static location to put all the HTML output files,<br> Do so below. be sure to add the trailing /</label></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-small" type="text" name="static" value="<?php if(file_exists('Config.cfg')) { $path=file_get_contents('Config.cfg'); echo $path;}else{echo getcwd();}?>"></td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-default btn-small" type="submit" name="setDir" value="Save" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>