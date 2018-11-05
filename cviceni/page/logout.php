<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 08:52
 */
session_destroy();

header('Location: ' . BASE_URL);
die();