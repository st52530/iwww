<h2>All users</h2>

<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 29/10/2018
 * Time: 08:07
 */

$userRepository = new UserRepository(Connection::getPdoInstance());
$allUsers = $userRepository->getAllUsers();
$table = new DataTable($allUsers);
$table->addColumn('id', 'ID');
$table->addColumn('email', 'E-mail');
$table->addColumn('created', 'Created');
$table->addActionColumn('id', 'Update', BASE_URL . "?page=users&action=update&id=%s");
$table->addActionColumn('id', 'Delete', BASE_URL . "?page=users&action=delete&id=%s");

$table->render();