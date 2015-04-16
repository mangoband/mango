<?php

$cflashPath = realpath(__DIR__ . '/../');
$vendorPath = realpath(__DIR__ . '/../../../');

include $cflashPath ."/autoload.php";
include $vendorPath ."/autoload.php";
if ( ! isset( $_SESSION ) ){ session_start(); } else{ $_SESSION = $_SESSION; }



