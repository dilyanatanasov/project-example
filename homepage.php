<?php
session_start();
if (empty($_SESSION["uid"])) {
   header("Location: index.php");
}

require_once dirname(__FILE__). "/core/Authentication.php";

if (!empty($_POST) &&
    isset($_POST["logout"]) &&
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}

require_once dirname(__FILE__). "/views/html/heading.html";
require_once dirname(__FILE__). "/views/html/homepage.html";
?>
