<?php
ob_start();
session_start();
$isLogged = isset($_SESSION['id']);
if (!$isLogged) {
    header("Location: " . '/iwww/cviceni/');
}
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Honzovo | Web developer</title>

    <style type="text/css">
        table {
            border-spacing: 0;
        }
        td, th {
            padding: 1em;
            border: #333333 solid 1px;
        }
    </style>
</head>
<body>

<nav>
    <a href="user.php?page=users">List</a>
    <a href="user.php?page=users&action=new">Add</a>
</nav>

<br> <br>

<?php
if ($_GET['action'] == "delete") {
    include "user_delete.php";
    include "user_read_all.php";
} else if ($_GET['action'] == "update") {
    include "user_update.php";
} else if ($_GET['action'] == "new") {
    include "user_add.php";
} else {
    include "user_read_all.php";
}
?>
</body>
</html>