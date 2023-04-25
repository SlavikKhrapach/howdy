<?php
/*
 * Slavik Khrapach
 * 4/18/2023
 * 328/diner/index.php
 * Controller for howdy project
 *
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {

    //echo '<h1>Welcome to My Diner!</h1>';

  //echo '<h1>Hello, World!</h1>';
    // Display view page
    $view = new Template();
    echo $view->render('views/home.html');

});

    $f3->route('GET /breakfast', function() {

        //echo '<h1>Breakfast Menu</h1>';

        // Display view page
        $view = new Template();
        echo $view->render('menus/breakfast.html');
});

$f3->route('GET /lunch', function() {

    //echo '<h1>Breakfast Menu</h1>';

    // Display view page
    $view = new Template();
    echo $view->render('views/menus/lunch.html');
});

$f3->route('GET /dinner', function() {

    //echo '<h1>Breakfast Menu</h1>';

    // Display view page
    $view = new Template();
    echo $view->render('views/menus/dinner.html');
});

$f3->route('GET|POST /order1', function($f3) {

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST")
        // Get data

        // Validate data

        // Store data in the session array

        // Redirect to order2 route
        $f3->reroute('order2');

    // Display view page
    $view = new Template();
    echo $view->render('views/orderForm1.html');
});

$f3->route('GET /order2', function() {


    // Display view page
    $view = new Template();
    echo $view->render('views/orderForm2.html');
});

$f3->route('GET /summary', function() {

    //echo '<h1>Breakfast Menu</h1>';

    // Display view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();
