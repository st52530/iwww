<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 09:12
 */

interface iDatabaseHelper
{
    function connect();

    function select($sql, $bindParams);
}