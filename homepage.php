<?php
session_start();
if (empty($_SESSION["uid"])) {
   header("Location: index.php");
}
require_once "/opt/lampp/htdocs/project-example/core/Authentication.php";

// If there is a post request
// And if there is a logout key
// And if the logout key has a value that is not empty "" or NULL
// Then logout
if (!empty($_POST) &&
    isset($_POST["logout"]) &&
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}

require_once "/opt/lampp/htdocs/project-example/views/homepage.html";

?>
