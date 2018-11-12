<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 12/11/2018
 * Time: 09:16
 */

class Authentication
{

    //private $conn = null;
    private $database = null;
    private static $instance = null;
    private static $identity;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Authentication();
        }

        return self::$instance;
    }

    private function __construct()
    {
        if (isset($_SESSION['identity'])) {
            self::$identity = $_SESSION['identity'];
        }
        $this->database = new DatabaseHelper();
        //$this->conn = Connection::getPdoInstance();
    }

    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            return false;
        }

        $user = $this->database->fetch("SELECT id, username, email, password FROM user WHERE email=:email", array(
            ":email" => $_POST['email']
        ));

        // TODO: Add hashing.
        if ($user != null && $user['password'] == $_POST['password']) {
            $_SESSION['identity'] = array(
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            );
            return true;
        }

        return false;
    }

    public function hasIdentity()
    {
        return self::$identity != null;
    }

    public function getIdentity()
    {
        return self::$identity;
    }

    public function logout()
    {
        self::$identity = null;
        session_destroy();
    }
}