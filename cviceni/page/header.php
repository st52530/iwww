<header>
    <div id="header-web-title">Honzovo</div>
    <img id="header-logo" src="./images/logo.png">
    <nav id="nav">
        <a href="<?= BASE_URL ?>">Home</a>
        <a href="<?= BASE_URL . "?page=blog" ?>">Blog</a>
        <a href="<?= BASE_URL . "?page=contact" ?>">Contact me</a>
        <?php
        if ($isLogged) {

            ?>
            <a href="<?= BASE_URL . "users/user.php?page=users" ?>">Users</a>
            <a href="<?= BASE_URL . "?page=logout" ?>">Logout</a>
            <?php
        } else {
            ?>
<!--            logged out-->
            <?php
        }
        ?>
    </nav>
</header>