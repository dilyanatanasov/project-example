<?php
require_once "BaseModel.php";
require_once dirname(dirname(__FILE__)) . "/repositories/UserRepository.php";

class User extends BaseModel
{
    public $id;
    public $username;
    public $password;
    public $access;
    private $userRepository;

    function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function view($id)
    {
        $userData = $this->userRepository->getUserById($id);
        if (!empty($userData)) {
            $user = new User();
            $user->id = $userData["id"];
            $user->username = $userData["username"];
            $user->password = $userData["password"];
            $user->access = $userData["access"];
            return $user;
        }
    }

    public function viewCredentials($username, $password)
    {
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

    public function list()
    {
        $usersData = $this->userRepository->getAllUsers();
        if (!empty($usersData)) {
            $usersList = [];
            foreach ($usersData as $users) {
                $user = new User();
                $user->id = $users["id"];
                $user->username = $users["username"];
                $user->password = $users["password"];
                $user->access = $users["access"];
                array_push($usersList, $user);
            }
            return $usersList;
        }
    }

    public function create()
    {
        return $this->userRepository->addNewUser($this->username, $this->password);
    }

    public function update()
    {
        return $this->userRepository->updateUserById($this->id, [
            "username" => $this->username,
            "password" => $this->password,
            "access" => $this->access
        ]);
    }

    public function delete()
    {
        return $this->userRepository->deleteById($this->id);
    }
}