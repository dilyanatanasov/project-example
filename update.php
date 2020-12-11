<?php
require_once dirname(__FILE__). "/models/Movie.php";

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/update.html";

$movie = new Movie();

if (!empty($_GET["movie_id"])) {
    $movieId = $_GET["movie_id"];
    $movieData = $movie->view($movieId);
    if (!empty($movieData)) {
        echo "<div class='container'>
            <form method='POST' action='update.php?update_id=".$movieData->id."'>
                <div class='form-group' >
                    <label>Title</label><br>
                    <input type='text' name='title' value='".$movieData->title."'><br>
                    <label>Description</label><br>
                    <textarea name='description'>".$movieData->description."</textarea><br>
                    <label>Main Actor(Not Required)</label><br>
                    <input type='text' name='main_actor' value='".$movieData->main_actor."'><br>
                    <label>Thumbnail</label><br>
                    <input type='text' name='thumbnail' value='".$movieData->thumbnail."'><br>
                    <label>Duration</label><br>
                    <input type='number' max='300' name='duration' value='".$movieData->duration."'><br>
                    <button class='btn btn-warning mt-3' type='submit' name='update'>Update</button>
                </div>
            </form>
        </div>";
    } else {
        header("Location: movie.php");
    }
} else if(!empty($_GET["update_id"])) {
    $movieUpdate = $movie->view($_GET["update_id"]);
    $movieUpdate->title = $_POST["title"];
    $movieUpdate->description = $_POST["description"];
    $movieUpdate->main_actor = $_POST["main_actor"];
    $movieUpdate->thumbnail = $_POST["thumbnail"];
    $movieUpdate->duration = $_POST["duration"];
    $movieUpdate->update();
    header("Location: movie.php");
} else {    
    header("Location: movie.php");
}
