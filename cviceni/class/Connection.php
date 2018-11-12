<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12/11/2018
 * Time: 08:19
 */

class Connection
{
    private static $instance = null;

    private function __construct()
    {
    }

    static function getPdoInstance() {
        if (self::$instance == null) {
            $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $connection;
        }

        return self::$instance;
    }
}