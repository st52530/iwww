<br><br><br>

<?php

// input

$messages = array();
if (isset($_POST['login'])) {
    if (empty($_POST['email'])) {
        array_push($messages, "E-mail cannot be empty!");
    }
    if (empty($_POST['password'])) {
        array_push($messages, "Password cannot be empty!");
    }

    if (empty($messages)) {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $statement = $conn->prepare("SELECT id, username, email, password FROM user WHERE email=:email");
            $statement->bindParam(':email', $_POST['email']);
            $statement->execute();

            $user = $statement->fetch();

            // TODO: Add hashing.
            if ($user != null && $user['password'] == $_POST['password']) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header('Location: ' . BASE_URL);
                die();
            } else {
                echo "Wrong username/password combination.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        foreach ($messages as $message) {
            echo "$message<br>";
        }
    }
}

// validation

// check if user and password matches

// Echo uzivatel existuje.
?>

<form method="post">
    <input type="email" name="email" placeholder="E-mail" value="<?= $_POST['email']; ?>">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login" name="login">
</form>