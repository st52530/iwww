<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 08:52
 */
Authentication::getInstance()->logout();

header('Location: ' . BASE_URL);
die();