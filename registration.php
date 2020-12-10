<?php
require_once dirname(__FILE__). "/repositories/UserRepository.php";
require_once "core/Mailer.php";

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
        $mailer = new Mailer();
        $mailer->sendMail("dilyanatanasov177@gmail.com", "dilyanatanasov177@gmail.com", "Dilyan Atanasov", "Welcome to the club", "<h1>Hello</h1>", "Hello");
        header("Location: index.php");
    }
}

require_once dirname(__FILE__). "/views/html/registrationpage.html";

