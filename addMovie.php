<?php

require_once dirname(__FILE__). "/repositories/MovieRepository.php";

$movieRepository = new MovieRepository();
if (!empty($_POST)) {
    if (
        !empty($_POST["title"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["thumbnail"]) &&
        !empty($_POST["duration"]) &&
        !empty($_POST["main_actor"])
    ) {
        
        if ($movieRepository->addNewMovie(
            $_POST["title"],
            $_POST["description"],
            $_POST["main_actor"],
            $_POST["thumbnail"],
            $_POST["duration"]
        )) {
            header("Location: homepage.php");
        }
    } else {
        echo "Error";
    }
}

require_once dirname(__FILE__). "/views/html/heading.html";
require_once dirname(__FILE__). "/views/html/addMovie.html";