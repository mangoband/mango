<?php


include( __DIR__.'/../autoloader.php');
$rootPath = explode('vendor/', htmlentities( $_SERVER['PHP_SELF']) );
echo var_dump( $rootPath[0] )."<br />";
           // $p = explode('?', $p[1]);
            echo var_dump( $_SERVER['DOCUMENT_ROOT'])."<br />";

require_once $_SERVER['DOCUMENT_ROOT'].$rootPath[0].'webroot/config.php';


$di  = new \Anax\DI\CDIFactoryDefault();
$di->set('MangoFlash', function() use ($di) {
            $flash = new \Mango\Flash\CFlash();
            $flash->setDI($di);
            return $flash;
        });

$app = new \Anax\MVC\CApplicationBasic($di);

$app->theme->addStylesheet('css/flash.css');
$message = "Testar om det funkar...";

$flash = new \Mango\Flash\CFlash();

$app->MangoFlash->set( $message , $type = 'notice' );
$app->MangoFlash->set( $message , $type = 'warning' );
$app->MangoFlash->set( $message , $type = 'error' );
$app->MangoFlash->set( $message , $type = 'success' );

$notice     = $app->MangoFlash->get('notice');
$warning    = $app->MangoFlash->get('warning');
$error      = $app->MangoFlash->get('error');
$success    = $app->MangoFlash->get('success');
$hello      = $app->MangoFlash->hello('Marcus');

$app->theme->setVariable('title', "Hello World Pagecontroller")
           ->setVariable('main', $error.$notice.$warning.$success."
    <h1>Hello World Pagecontroller</h1>
    <p>This is a sample pagecontroller that shows how to use Anax.</p>
");



// Render the response using theme engine.
$app->theme->render();