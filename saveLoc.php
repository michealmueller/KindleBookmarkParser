<?php
/**
 * Created by JetBrains PhpStorm.
 * User: micheal
 * Date: 11/2/12
 * Time: 5:45 PM
 * To change this template use File | Settings | File Templates.
 */
	require_once 'configWork.php';
    require_once 'redirect.php';

	setSaveLoc();

	function setSaveLoc()
	{
		$saveLoc = $_POST['static'];

		if (file_exists('config.cfg') != true) {
			$configWork = new configWork();

			$configWork -> createConfig($saveLoc);
		}
        $redirect = new redirection();
        $redirect -> redirect();
	}


?>