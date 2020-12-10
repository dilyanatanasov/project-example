<?php

require_once dirname(__FILE__). "/controllers/UploadController.php";
require_once dirname(__FILE__). "/models/Movie.php";

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

        $movie = new Movie();
        $movie->title = $_POST["title"];
        $movie->description = $_POST["description"];
        $movie->main_actor = $_POST["main_actor"];
        $movie->thumbnail = $fileName;
        $movie->duration = $_POST["duration"];
        if ($movie->create()) {
            header("Location: movie.php");
        }
    } else {
        echo "Error";
    }
}

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/addMovie.html";





----------------------------------------------------------
3 Model
$user = new User();
$user->view($id);

----------------------------------------------------------
2 Repostiory
function getUserById($id) {
    $sql = "SELECT * FROM users WHERE id = $id";
    $result $this->connection->query($sql);
    return $result->fetch();
}

----------------------------------------------------------
1 SQL
SELECT * FROM users