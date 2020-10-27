<?php
session_start();
if (empty($_SESSION["uid"])) {
   header("Location: index.php");
}

require_once dirname(__FILE__). "/repositories/MovieRepository.php";
require_once dirname(__FILE__). "/core/Authentication.php";

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

$movieRepository = new MovieRepository();
$movies = $movieRepository->getAllMovies();

echo "<table style='text-align=center'>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Main Actor</th>
            <th>Thumbnail</th>
            <th>Duration</th>
        </tr>";

foreach($movies as $movie) {
    echo "
    <tr>
        <td>".$movie['title']."</td>
        <td>".$movie['description']."</td>
        <td>".$movie['main_actor']."</td>
        <td>".$movie['thumbnail']."</td>
        <td>".$movie['duration']."</td>
    </tr>
    ";
}

require_once dirname(__FILE__). "/views/heading.html";
require_once dirname(__FILE__). "/views/homepage.html";

?>
