<?php

/**
 * Class Authentication
 */
class Authentication {
    public $username;
    public $password;
    public $authenticatedUserName = "martin";
    public $authenticatedUserPassword = "4321";

    function __construct() {
        // TODO
    }

    /**
     * Login to the system
     * @param $usr
     * @param $pwd
     */
    public function login($usr, $pwd) {
        $this->username = $usr;
        $this->password = $pwd;
        if ($this->authenticatedUserName == $this->username &&
            $this->authenticatedUserPassword == $this->password) {
            $_SESSION["uid"] = $this->username;
            header("Location: homepage.php");
        } else {
            header("Location: index.html");
        }
    }

    /**
     * Logout of the system
     */
    public function logout() {
        $_SESSION["uid"] = "";
        session_destroy();
        header("Location: index.html");
    }
}