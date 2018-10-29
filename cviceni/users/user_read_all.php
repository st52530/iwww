<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/2018
 * Time: 08:07
 */

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $statement = $conn->prepare("SELECT * FROM user");
    $statement->execute();

    $users = $statement->fetchAll();

    echo "<table>";
    echo "<tr><th>ID</th><th>e-mail</th><th>username</th><th>update</th><th>delete</th></tr>";
    foreach ($users as $user) {
        echo "<tr>
<td>" . $user['id'] . "</td>
<td>" . $user['email'] . "</td>
<td>" . $user['username'] . "</td>
<td><a href='user.php?action=update&id=" . $user['id'] . "'>update</a></td>
<td><a href='user.php?action=delete&id=" . $user['id'] . "'>delete</a></td>
</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}