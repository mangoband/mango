<?php

include __DIR__ . "/../test/config.php";


 $di    = new \Anax\DI\CDIFactoryDefault();
        $m = new \Mango\Flash\CFlash();
        $m->setDI($di);
        
        $di->setShared('session', function () {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            //$session->start();
            return $session;
        });
       /* $di->setShared('MangoFlash', function()   {
            $flash = new \Mango\Flash\CFlash();
            $flash->setDI($di);
            return $flash;
        });*/
        $app = new \Anax\Kernel\CAnax($di);
    $app->theme->addStylesheet('css/flash.css');
    
    
    $message    = "is time right now...";
    $name       = "Developer, this is a way to show you how this module could look in your browser.";
    
 
    
    $m->set( $message , $type = 'notice' );
    $m->set( $message , $type = 'warning' );
    $m->set( $message , $type = 'error' );
    $m->set( $message , $type = 'success' );
    $m->set( $name ,    $type = 'hello' );
    
    
    
    $notice     = $m->get('notice');
    $warning    = $m->get('warning');
    $error      = $m->get('error');
    $success    = $m->get('success');
    $hello      = $m->get('hello');
    
    $stylesheet = '../copy-content-to-css-folder/flash.css';
    
    ?>
<!doctype html>
<html class='no-js' lang='sv'>
<head>
<meta charset='utf-8'/>
<link rel='stylesheet' type='text/css' href='<?=$stylesheet?>'/>
</head>
<body>
  <?=$notice.$warning.$error.$success.$hello?>  
</body>
</html>