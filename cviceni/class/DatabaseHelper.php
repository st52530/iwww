<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 09:13
 */

class DatabaseHelper implements iDatabaseHelper
{

    public $connection = null;

    public function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        $this->$connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $this->$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function execute($sql, $bindParams)
    {
        // prepare sql and bind parameters
        $statement = $this->$connection->prepare($sql);
        foreach ($bindParams as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
    }

    function fetch($sql, $bindParams)
    {
        $statement = $this->$connection->prepare($sql);
        foreach ($bindParams as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return $statement->fetch();
    }

    function fetchAll($sql, $bindParams)
    {
        $statement = $this->$connection->prepare($sql);
        foreach ($bindParams as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return $statement->fetchAll();
    }


}