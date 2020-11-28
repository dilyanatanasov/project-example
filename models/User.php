<?php
require_once "BaseModel.php";
require_once dirname(dirname(__FILE__)). "/repositories/UserRepository.php";

class User extends BaseModel {
    public $id;
    public $username;
    public $password;
    public $access;
    private $userRepository;

    function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function view($id) {
       $userData = $this->userRepository->getUserById($id);
       if (!empty($userData)) {
        $user = new User();
        $user->username = $userData["username"];
        $user->password = $userData["password"];
        $user->access = $userData["access"];
        return $user;
       }
    }

    public function viewCredentials($username, $password) {
        $userData = $this->userRepository->getUserCredentials($username, $password);
        if (!empty($userData)) {
            $user = new User();
            $user->id = $userData["id"];
            $user->username = $userData["username"];
            $user->password = $userData["password"];
            $user->access = $userData["access"];
            return $user;
        }
    }

    public function list() {
        
    }

    public function create() {
        
    }
    
    public function update() {
        
    }

    public function delete() {
        
    }
}