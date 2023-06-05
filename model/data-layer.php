<?php

/* diner/model/data-layer.php
    Returns data for the diner app
    This is a part of the model
    Eventually, this will read write the D */

require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{
    /**
     * @var PDO The database connection object
     */
    private $_dbh;

    /**
     * DataLayer constructor
     */
    function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            //echo 'Connected to database!!';
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /** saveOrder saves an order from the Diner
     * @param Order An order object
     * @return int The orderID for the new order
     */
    function saveOrder($order)
    {
        //1. Define the query (test first!)
        $sql = "INSERT INTO orders (food, meal, condiments)
                    VALUES (:food, :meal, :condiments)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $food = $order->getFood();
        $meal = $order->getMeal();
        $conds = $order->getCondiments();
        $statement->bindParam(':food', $food);
        $statement->bindParam(':meal', $meal);
        $statement->bindParam(':condiments', $conds);

        //4. Execute
        $statement->execute();

        //5. Return the primary key
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    // Get the meals for the order1 form
    static function getMeals()
    {
        $meals = array("breakfast", "brunch", "lunch", "dinner");
        return $meals;
    }

    // Get the condiments for the order2 form
    static function getCondiments()
    {
        $condiments = array("ketchup", "mustard", "mayo", "sriracha");
        return $condiments;
    }
}