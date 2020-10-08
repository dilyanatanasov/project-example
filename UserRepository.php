<?php
require_once "Db.php";

class UserRepository extends Db {
    function __constructor() {
        // TODO
    }

    public function addNewUser($username, $password) {
        $sql = "INSERT INTO user_credentials(id, username, password)
                VALUE (NULL, '".$username."', '".$password."')";
        $this->connection->exec($sql);
        return true;
    }

    public function getUserCredentials($username, $password) {
        $sql = "SELECT 
                    * 
                FROM 
                    user_credentials
                WHERE
                    username = '".$username."' AND
                    password = '".$password."'
                LIMIT 1";
        $stmt = $this->connection->query($sql);
        $user = $stmt->fetchAll();

        if (empty($user)) {
            return [];
        } else {
            return $user[0];
        }
    }
}