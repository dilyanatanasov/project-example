<?php
require_once dirname(__FILE__). "/repositories/UserRepository.php";

if (!empty($_POST) &&
    isset($_POST["username"]) &&
    !empty($_POST["username"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["password"]))
{
    $userRepository = new UserRepository();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $access = $_POST["access"];
    $hashedPassword = hash("sha512", $password);
    if ($userRepository->addNewUser($username, $hashedPassword)) {
        header("Location: index.php");
    }
}

require_once dirname(__FILE__). "/views/html/registrationpage.html";

