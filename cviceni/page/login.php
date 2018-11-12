<br><br><br>

<?php

// input

if (isset($_POST['login'])) {
    if (Authentication::getInstance()->login($_POST['email'], $_POST['password'])) {
        header('Location: ' . BASE_URL);
        die();
    } else {
        echo "Wrong username/password combination.";
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