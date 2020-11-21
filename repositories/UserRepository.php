<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";

class UserRepository extends Db {
    function __constructor() {
        // TODO
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM user_credentials";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function addNewUser($username, $password) {
        $sql = "INSERT INTO user_credentials(id, username, password)
                VALUE (NULL, '".$username."', '".$password."')";
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

    public function getUserByPin($pin) {
        $stmt = $this->connection->query("SELECT 
                    * 
                FROM 
                    user_credentials
                WHERE
                    username LIKE '%".$pin."%'");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserById($id) {
        $sql = "SELECT 
                    * 
                FROM 
                    user_credentials
                WHERE
                    id = $id";
        $stmt = $this->connection->query($sql); 
        $stmt->execute(); 
        return $stmt->fetch();
    }

    public function updateUserById($data) {
        $sql = "
            UPDATE
                user_credentials
            SET 
                `access` = ".$data['access']."
            WHERE
                id = ".$data['update_id']."
        ";
        $this->connection->exec($sql);
        return true;
    }
}