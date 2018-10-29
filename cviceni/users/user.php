<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <title>Honzovo | Web developer</title>
</head>
<body>

<nav>
    <a href="user.php?page=users">List</a>
    <a href="user.php?page=users&action=new">Add</a>
</nav>

<?php
if ($_GET['action'] == "delete") {

} else if ($_GET['action'] == "update") {

} else if ($_GET['action'] == "new") {
    include "user_add.php";
} else {
    include "user_read_all.php";
}
?>
</body>
</html>