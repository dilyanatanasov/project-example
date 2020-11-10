<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";

class UserRepository extends Db {
    function __constructor() {
        // TODO
    }

    public function addNewUser($username, $password, $access) {
        $sql = "INSERT INTO user_credentials(id, username, password, access)
                VALUE (NULL, '".$username."', '".$password."', $access)";
        $this->connection->exec($sql);
        return true;
    }

    public function getUserCredentials($username, $password) {
        $stmt = $this->connection->prepare("SELECT 
                    * 
                FROM 
                    user_credentials
                WHERE
                    username = :username AND
                    password = :password
                LIMIT 1");
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchAll();
        
        if (empty($user)) {
            return [];
        } else {
            return $user[0];
        }
    }
}