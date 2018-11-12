<h2>Get by e-mail</h2>

<form action="" method="post">
    <input name="email" placeholder="E-mail">
    <input type="submit" value="Find">
</form>

<?php
if (isset($_POST['email'])) {
    $userRepository = new UserRepository(Connection::getPdoInstance());
    $allUsers = $userRepository->getByEmail($_POST['email']);
    $table = new DataTable($allUsers);
    $table->addColumn('id', 'ID');
    $table->addColumn('email', 'E-mail');
    $table->addColumn('created', 'Created');
    $table->render();
}