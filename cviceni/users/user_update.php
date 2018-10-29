<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/2018
 * Time: 08:39
 */
if (!empty($_GET['id'])) {
    if (isset($_POST['update_user'])) {
        $feedback = array();
        if (empty($_POST['email'])) {
            array_push($feedback, "E-mail is required.");
        }
        if (empty($_POST['username'])) {
            array_push($feedback, "Username is required.");
        }
        if (empty($_POST['password'])) {
            array_push($feedback, "Password is required.");
        }

        if (empty($feedback)) {
            try {
                $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare sql and bind parameters
                $statement = $conn->prepare("UPDATE user SET username = :username, password = :password, email = :email, description = :description WHERE id = :id");
                $statement->bindParam(':username', $_POST['username']);
                $statement->bindParam(':password', $_POST['password']);
                $statement->bindParam(':email', $_POST['email']);
                $statement->bindParam(':description', $_POST['description']);
                $statement->bindParam(":id", $_GET['id']);
                $statement->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            foreach ($feedback as $f) {
                echo "$f<br>";
            }
        }
    }

    $user = null;
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $statement = $conn->prepare("SELECT * FROM user WHERE id = :id");
        $statement->bindParam(":id", $_GET['id']);
        $statement->execute();

        $user = $statement->fetch();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($user != null) {

        ?>


        <form action="<?= CURRENT_URL; ?>" method="post">
            <input type="email" name="email" placeholder="Your email" value="<?= $user['email'] ?>"> <br>
            <input type="text" name="username" placeholder="Your username" value="<?= $user['username'] ?>"> <br>
            <input type="password" name="password" placeholder="Password"> <br>
            <textarea placeholder="Description" name="description"><?= $user['description'] ?></textarea> <br>
            <input type="submit" name="update_user" value="Upravit">
        </form>

        <?php

    }
}
