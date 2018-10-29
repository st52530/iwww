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
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $statement = $conn->prepare("INSERT INTO user (username, password, email, description, created) VALUES (:username,:password,:email,:description, NOW())");
            $statement->bindParam(':username', $_POST['username']);
            $statement->bindParam(':password', $_POST['password']);
            $statement->bindParam(':email', $_POST['email']);
            $statement->bindParam(':description', $_POST['description']);
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
?>

<form action="user.php?action=new" method="post">
    <input type="email" name="email" placeholder="Your email"> <br>
    <input type="text" name="username" placeholder="Your username"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <textarea placeholder="Description" name="description"></textarea> <br>
    <input type="submit" name="add_user" value="Pridat">
</form>
