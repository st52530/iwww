<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/2018
 * Time: 08:39
 */

if (!empty($_GET['id'])) {
    $database->execute("DELETE FROM user WHERE id = :id", array(
        ":id" => $_GET['id']
    ));
}