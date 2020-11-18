<?php 
session_start();
if ($_SESSION["uid"] === 1) {
    header("Location: index.php");
 }


require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/search.html";

require_once dirname(__FILE__). "/repositories/UserRepository.php";

if (!empty($_POST)) {
    if (!empty($_POST["search_topic"])) {
        $pin = $_POST["search_topic"];
        $userRepo = new UserRepository();
        $users = $userRepo->getUserByPin($pin);
        print_r($users);
    }
}