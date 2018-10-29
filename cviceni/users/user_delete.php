<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/2018
 * Time: 08:39
 */

if (!empty($_GET['id'])) {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement = $conn->prepare("DELETE FROM user WHERE id = :id");
        $statement->bindParam(":id", $_GET['id']);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}