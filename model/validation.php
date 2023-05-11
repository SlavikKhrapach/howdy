<?php

/* 328/diner/model/validation.php */

function validMeal($meal) {

    // If meal in bot empty
    // and is in the array of
    // valid meals, return true
    return (!empty($meal) && in_array($meal, getMeals()));

}
