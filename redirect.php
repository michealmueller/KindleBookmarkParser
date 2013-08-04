<?php
/**
 * Created by JetBrains PhpStorm.
 * User: micheal
 * Date: 11/4/12
 * Time: 8:41 PM
 * To change this template use File | Settings | File Templates.
 */
class redirection
{
    function redirect()
    {
        header('Location: index.php');
        exit;
    }
}