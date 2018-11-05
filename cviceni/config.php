<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 22/10/2018
 * Time: 08:09
 */

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'iwww');
define('DB_PASSWORD', 'iwww');
define('DB_NAME', 'iwww');

define('BASE_URL', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

define('CURRENT_URL', $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING']);

require_once "./class/iDatabaseHelper.php";
require_once "./class/DatabaseHelper.php";
$database = new DatabaseHelper();