<?php

include __DIR__ . "/../test/config.php";

    $di = new \Anax\DI\CDIFactoryDefault();
   
    
    $di->setShared('session', function () {
        $session = new \Anax\Session\CSession();
        $session->configure(ANAX_APP_PATH . 'config/session.php');
        $session->name();
        $session->start();
        return $session;
    });
    
    $di->setShared('MangoFlash', function() use($di)   {
            $flash = new \Mango\Flash\CFlash();
            $flash->setDI($di);
            return $flash;
        });
    $app = new \Anax\Kernel\CAnax($di);
    
    $message    = "is time right now...";
    $name       = "Developer, this is a way to show you how this module could look in your browser.";
    
 
    $app->MangoFlash->set( $message, 'notice');
    $app->MangoFlash->set( $message, 'warning');
    $app->MangoFlash->set( $message, 'error');
    $app->MangoFlash->set( $message, 'success');
    $app->MangoFlash->set( $name, 'hello');
    
    $notice     = $app->MangoFlash->get('notice');
    $warning    = $app->MangoFlash->get('warning');
    $error      = $app->MangoFlash->get('error');
    $success    = $app->MangoFlash->get('success');
    $hello      = $app->MangoFlash->get('hello');
    
    
    $stylesheet = '../copy-content-to-css-folder/flash.css';
   
    ?>
<!doctype html>
<html class='no-js' lang='us'>
<head>
<meta charset='utf-8'/>
<title>CFlash</title>
<link rel='stylesheet' type='text/css' href='<?=$stylesheet?>'/>
</head>
<body>
  <?=$notice.$warning.$error.$success.$hello?>  
</body>
</html>