<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12/11/2018
 * Time: 08:25
 */

class UserRepository
{
    private $conn = null;

    /**
     * UserRepository constructor.
     * @param $conn PDO connection.
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $statement = $this->conn->prepare("SELECT * FROM user");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getByEmail($email) {
        $statement = $this->conn->prepare("SELECT * FROM user WHERE email LIKE concat('%', :email, '%')");
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetchAll();
    }
}