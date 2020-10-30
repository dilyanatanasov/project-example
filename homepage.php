<?php
session_start();
if (empty($_SESSION["uid"])) {
   header("Location: index.php");
}

require_once dirname(__FILE__). "/repositories/MovieRepository.php";
require_once dirname(__FILE__). "/core/Authentication.php";

if (!empty($_POST) &&
    isset($_POST["logout"]) &&
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}

$movieRepository = new MovieRepository();
$movies = $movieRepository->getAllMovies();

require_once dirname(__FILE__). "/views/html/heading.html";
require_once dirname(__FILE__). "/views/html/homepage.html";

echo "<div class='container'>
        <table class='table' style='text-align=center'>
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
echo "</table>
    </div>";
?>
