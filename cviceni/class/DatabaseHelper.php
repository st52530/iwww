<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 09:13
 */

class DatabaseHelper implements iDatabaseHelper
{
    public function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        // TODO: Implement connect() method.
    }

    function select($sql, $bindParams)
    {
        // TODO: Implement select() method.
    }

}