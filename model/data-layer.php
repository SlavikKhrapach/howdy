<?php

/* diner/model/data-layer.php
    Returns data for the diner app
    This is a part of the model
    Eventually, this will read write the D */

require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{

    /*
     * @var PDO The database connection object
     */
    private $_dbh;

    /*
     * DataLayer constructor
     */

    public function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to database!!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static function getMeals()
    {
        $meals = array("breakfast", "brunch", "lunch", "dinner");
        return $meals;
    }


    static function getCondiments()
    {
        $condiments = array("ketchup", "mustard", "mayo", "sriracha");
        return $condiments;
    }
}
