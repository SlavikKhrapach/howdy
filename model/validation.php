<?php

/* 328/diner/model/validation.php */

function validMeal($meal) {

    // If meal is not empty
    // and is in the array of
    // valid meals, return true
    return (!empty($meal) && in_array($meal, getMeals()));
}

function validFood($food) {
    $food = trim($food);
    return (strlen($food) > 2 && !preg_match("/^[0-9*#~+]+$/", $food));

}

function validCondiments($userCondiments) {

    $validCondiments = getCondiments();

    //Check each user condiment against array of valid condiments
    foreach ($userCondiments as $userCondiment) {
        if (!in_array($userCondiment, $validCondiments)) {
            return false;
        }
    }
    return true;
}


/* Add a validFood() function to your model/validation.php */
/* Modify controller to validate food */
/* Modify view page to display error if there is one */


/**/