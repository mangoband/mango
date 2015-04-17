<?php

/**
 * Get all configuration details to be able to execute the test suite.
 *
 */
include __DIR__ . "/../autoloader.php";
include __DIR__ . "/../vendor/autoload.php";

$installPath = realpath( __DIR__  . '/../vendor/anax/mvc/');
//require ($installPath."/webroot/config_with_app.php");
if ( ! isset( $_SESSION ) ){ $started = true;} else{ $_SESSION = $_SESSION; }
define('ANAX_INSTALL_PATH', realpath( __DIR__  . '/../vendor/anax/mvc') . '/');
define('ANAX_APP_PATH',     ANAX_INSTALL_PATH . 'app/');




