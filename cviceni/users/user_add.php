<?php

$feedback = array();

if (isset($_POST['add_user'])) {
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
        $database->execute("INSERT INTO user (username, password, email, description, created) VALUES (:username,:password,:email,:description, NOW())", array(
            ":username" => $_POST['username'],
            ":password" => $_POST['password'],
            ":email" => $_POST['email'],
            ":description" => $_POST['description']
        ));
    } else {
        foreach ($feedback as $f) {
            echo "$f<br>";
        }
    }
}
?>

<form action="<?= CURRENT_URL; ?>" method="post">
    <input type="email" name="email" placeholder="Your email"> <br>
    <input type="text" name="username" placeholder="Your username"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <textarea placeholder="Description" name="description"></textarea> <br>
    <input type="submit" name="add_user" value="Pridat">
</form>
