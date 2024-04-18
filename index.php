<?php
// This is controller

ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once ('vendor/autoload.php');

//instantiate the f3 base class
$f3 = Base::instance();

//define a default route
//https://dpjprogramming.greenriverdev.com/328/HelloFatFree/
$f3->route('GET /', function(){
    //echo '<h1> Hello Pets</h1>';

    //render view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//order
$f3->route('GET|POST /order', function(){
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//run fat free
$f3->run();
?>