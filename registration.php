<?php
require_once dirname(__FILE__). "/repositories/UserRepository.php";
require_once "core/Mailer.php";

$userRepository = new UserRepository();
$mailer = new Mailer();

if (!empty($_POST) &&
    isset($_POST["username"]) &&
    !empty($_POST["username"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["password"]))
{    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $access = $_POST["access"];
    $hashedPassword = hash("sha512", $password);

    if ($userRepository->addNewUser($username, $hashedPassword)) {
        $mailer->sendMail("email@example.com", "email@example.com", "Lorem Ipsum", "Welcome to the club", "<h1>Hello</h1>", "Hello");
       
        header("Location: index.php");
    }
}

require_once dirname(__FILE__). "/views/html/registrationpage.html";

