<?php
require_once "/opt/lampp/htdocs/project-example/repositories/UserRepository.php";

if (!empty($_POST) &&
    isset($_POST["username"]) &&
    !empty($_POST["username"]) &&
    isset($_POST["password"]) &&
    !empty($_POST["password"]))
{
    $userRepository = new UserRepository();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = hash("sha512", $password);

    if ($userRepository->addNewUser($username, $hashedPassword)) {
        header("Location: /opt/lampp/htdocs/project-example/index.php");
    }
}

require_once "/opt/lampp/htdocs/project-example/views/registrationpage.html";

?>


