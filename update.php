<?php
require_once dirname(__FILE__). "/repositories/MovieRepository.php";

require_once dirname(__FILE__). "/views/html/heading.html";
require_once dirname(__FILE__). "/views/html/update.html";

$movieRepository = new MovieRepository();

if (!empty($_GET["movie_id"])) {
    $movieId = $_GET["movie_id"];
    $movie = $movieRepository->getMovieById($movieId);
    if (!empty($movie)) {
        echo "<div class='container'>
            <form method='POST' action='update.php?update_id=".$movie['id']."'>
                <div class='form-group' >
                    <label>Title</label><br>
                    <input type='text' name='title' value='".$movie['title']."'><br>
                    <label>Description</label><br>
                    <textarea name='description'>".$movie['description']."</textarea><br>
                    <label>Main Actor(Not Required)</label><br>
                    <input type='text' name='main_actor' value='".$movie['main_actor']."'><br>
                    <label>Thumbnail</label><br>
                    <input type='text' name='thumbnail' value='".$movie['thumbnail']."'><br>
                    <label>Duration</label><br>
                    <input type='number' max='300' name='duration' value='".$movie['duration']."'><br>
                    <button class='btn btn-warning mt-3' type='submit' name='update'>Update</button>
                </div>
            </form>
        </div>";
    } else {
        header("Location: movie.php");
    }
} else if(!empty($_GET["update_id"])) {
    $movieId = $_GET["update_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $main_actor = $_POST["main_actor"];
    $thumbnail = $_POST["thumbnail"];
    $duration = $_POST["duration"];
    
    $update_data = [
        "movie_id" => $movieId,
        "title" => $title,
        "description" => $description,
        "main_actor" => $main_actor,
        "thumbnail" => $thumbnail,
        "duration" => $duration
    ];

    $movieRepository->updateMovieById($update_data);
    header("Location: movie.php");
} else {    
    header("Location: movie.php");
}
