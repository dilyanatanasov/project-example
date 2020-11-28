<?php
require_once "Db.php";
require_once dirname(dirname(__FILE__)). "/models/User.php";

/**
 * Class Authentication
 */
class Authentication {
    private $username;
    private $password;

    private $user;

    function __construct() {
        $this->user = new User();
    }

    /**
     * Login to the system
     * @param $usr
     * @param $pwd
     */
    public function login($usr, $pwd) {
        $this->username = $usr;
        $this->password = $pwd;

        $userFromDb = $this->user->viewCredentials($this->username, $this->password);
        if (!empty($userFromDb)) {
            $_SESSION["uid"] = $userFromDb->id;
            $_SESSION["username"] = $userFromDb->username;
            $_SESSION["access"] = $userFromDb->access;
            header("Location: ../homepage.php");
        } else {
            header("Location: index.php");
        }
    }

    /**
     * Logout of the system
     */
    public function logout() {
        $_SESSION["uid"] = "";
        session_destroy();
        header("Location: index.php");
    }

    public function validToken($token) {
        return ($token === "abc1234");
    }
}