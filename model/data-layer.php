<?php

/* diner/model/data-layer.php
    Returns data for the diner app
    This is a part of the model
    Eventually, this will read write the D */

function getMeals() {
    $meals = array("breakfast", "brunch", "lunch", "dinner");
    return $meals;
}


function getCondiments() {
    $condiments = array("ketchup", "mustard", "mayo", "sriracha");
    return $condiments;
}
