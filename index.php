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
require_once('model/data-layer.php');
require_once('model/validation.php');

// Test validation

//if(validMeal())

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {

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

$f3->route('GET /happy-hour', function() {

    //echo '<h1>Breakfast Menu</h1>';

    // Display view page
    $view = new Template();
    echo $view->render('views/menus/happyHour.html');
});

$f3->route('GET|POST /order1', function($f3) {

    $food = "";
    $meal = "";

    // If the form has been posted
    // "Auto-global" arrays: $_SERVER, $_GET, $_POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Get data
        // array(2) { ["food"]=> string(5) "chips" ["meal"]=> string(5) "lunch" }
        if (isset($_POST['meal'])) {
            $food = $_POST['food'];
        }

        if (isset($_POST['meal'])) {
            $meal = $_POST['meal'];
        }

        // Validate data
        if(validMeal($meal)) {
            $f3->set('SESSION.meal', $meal);
        } else {
            $f3->set('errors["meal"]', 'Invalid meal selected');
        }

        // Store data in the session array
        $f3->set('SESSION.food', $food);

        // Redirect to order2 route
        $f3->reroute('order2');
    }

    // Get the data from the model and add it to the hive
    $f3->set('meals', getMeals());


    // Display view page
    $view = new Template();
    echo $view->render('views/orderForm1.html');
});

$f3->route('GET|POST /order2', function($f3) {

    // If the form is posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Get the data
        //var_dump($_POST);
        //array(1) { ["conds"]=> array(1) { [0]=> string(7) "ketchup" } }
        $conds = implode(", ", $_POST['conds']);

        // Store the data in the session array
        $f3->set('SESSION.cond', $conds);

        // Redirect to the summary route
        $f3->reroute('summary');
    }

    // Get the data from the model and add it to the hive
    $f3->set('condiments', getCondiments());

    // Display view page
    $view = new Template();
    echo $view->render('views/orderForm2.html');
});

$f3->route('GET /summary', function() {

    //echo '<h1>Breakfast Menu</h1>';

    // Display view page
    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

// Run Fat-Free
$f3->run();
