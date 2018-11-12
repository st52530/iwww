<br><br><br>

<nav>
    <a href="<?= BASE_URL . "?page=users" ?>">Read all users</a>
    <a href="<?= BASE_URL . "?page=users&action=email" ?>">Find by e-mail</a>
    <a href="<?= BASE_URL . "?page=users&action=new" ?>">Add</a>
</nav>
<br><br>
<?php

if (!Authentication::getInstance()->hasIdentity()) {
    header("Location: ". BASE_URL);
}

/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 05/11/2018
 * Time: 10:20
 */

if ($_GET['action'] == "delete") {
    include "./users/user_delete.php";
    include "./users/user_read_all.php";
} else if ($_GET['action'] == "email") {
    include "./users/user_find_by_email.php";
} else if ($_GET['action'] == "update") {
    include "./users/user_update.php";
} else if ($_GET['action'] == "new") {
    include "./users/user_add.php";
} else {
    include "./users/user_read_all.php";
}