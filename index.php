<?php
session_start();
if (!empty($_SESSION["uid"])) {
    header("Location: homepage.php");
}

require_once "/opt/lampp/htdocs/project-example/views/loginpage.html";
?>