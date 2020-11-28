<?php

require_once dirname(__FILE__). "/controllers/UploadController.php";
require_once dirname(__FILE__). "/repositories/MovieRepository.php";

$movieRepository = new MovieRepository();
if (!empty($_POST)) {
    if (
        !empty($_POST["title"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["duration"]) &&
        !empty($_POST["main_actor"])
    ) {
        $uploadManager = new UploadController();
        $fileName = $uploadManager->uploadImg();
        if (!$fileName) {
            echo "Error on upload";
        }
        
        if ($movieRepository->addNewMovie(
            $_POST["title"],
            $_POST["description"],
            $_POST["main_actor"],
            $fileName,
            $_POST["duration"]
        )) {
            header("Location: movie.php");
        }
    } else {
        echo "Error";
    }
}

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/addMovie.html";