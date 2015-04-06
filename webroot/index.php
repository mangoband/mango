<?php


include( __DIR__.'/../autoloader.php');


$flash = new \Mango\cflash\cflash\Flash\CFlash();

$app->MangoFlash->set( $message , $type = 'notice' );
echo $app->MangoFlash->get('notice');

$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\MVC\CApplicationBasic($di);
$error = "<p class='flash_error'>Error!!!</p>";
$notice = "<p class='flash_notice'>Notice!!!</p>";
$warning = "<p class='flash_warning'>Warning!!!</p>";
$success = "<p class='flash_success'>Success!!!</p>";

$app->theme->addStylesheet('css/flash.css');

$app->theme->setVariable('title', "Hello World Pagecontroller")
           ->setVariable('main', $error.$notice.$warning.$success."
    <h1>Hello World Pagecontroller</h1>
    <p>This is a sample pagecontroller that shows how to use Anax.</p>
");



// Render the response using theme engine.
$app->theme->render();