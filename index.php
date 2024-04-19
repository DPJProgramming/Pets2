<?php
session_start();

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
$f3->route('GET|POST /order', function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Validate the data
        if (empty($_POST['pet'])) {
            echo "Please supply a pet type";
        }
        else{
            $pet = $_POST['pet'];
            $f3->set('SESSION.pet', $pet);
        }

        if (empty($_POST['color'])) {
            echo "Please supply a pet type";
        }
        else{
            $color = $_POST['color'];
            $f3->set('SESSION.color', $color);
        }

    }

    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//run fat free
$f3->run();
?>