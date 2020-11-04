<?php
require_once dirname(__FILE__). "/repositories/MovieRepository.php";

$movieRepository = new MovieRepository();

if (!empty($_POST['delete'])) {
    $movie_id = $_POST['delete'];
    $movieRepository->deleteMovieById($movie_id);
    header("Location: movie.php");
} else {
    header("Location: movie.php");
}