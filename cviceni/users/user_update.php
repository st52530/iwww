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
            $database->execute("UPDATE user SET username = :username, password = :password, email = :email, description = :description WHERE id = :id", array(
                ":username" => $_POST['username'],
                ":password" => $_POST['password'],
                ":email" => $_POST['email'],
                ":description" => $_POST['description'],
                ":id" => $_GET['id']
            ));
        } else {
            foreach ($feedback as $f) {
                echo "$f<br>";
            }
        }
    }

    $user = $database->fetch("SELECT * FROM user WHERE id = :id", array(
        ":id" => $_GET['id']
    ));
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
