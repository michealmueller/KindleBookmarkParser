<?php
/**
 * Created by JetBrains PhpStorm.
 * User: micheal
 * Date: 11/2/12
 * Time: 4:49 PM
 * To change this template use File | Settings | File Templates.
 */
  class configWork
  {
	  public $savedDir;
	  public  $os;
	  protected $filename = 'Config.cfg';
	  protected $mode = 'w';

	  function detectConfig()
	  {
		  if (file_exists($this -> filename) == true)
		  {
		  	$this -> savedDir = file_get_contents('Config.cfg', FILE_USE_INCLUDE_PATH);
              return true;
		  }
		  else
		  {
			$this -> savedDir = getcwd();
              return false;
		  }
	  }

      function createConfig($dir)
      {
	      try {
		      file_put_contents($this -> filename, $dir);
	      } catch (Exception $e) {
		      //throw new Exception('Uh OH, Something is wrong, The file could not be written. ', 0, $e);
		      echo 'ERROR: ' . $e -> getMessage();
	      }
      }

	  function detectOS()
	  {
		  //detect the os for directory structure
		  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			  $this -> os = 'Windows';
		  } else {
			  $this -> os = 'Linux';
		  }

		  if($this -> os == 'Windows')
		  {
			  $this -> os ='1';
		  }else {
			  $this -> os = '2';
		  }
	  }

  }

?>