<?php
require_once dirname(__FILE__). "/repositories/MovieRepository.php";

require_once dirname(__FILE__). "/views/html/heading.html";
require_once dirname(__FILE__). "/views/html/movies.html";


$movieRepository = new MovieRepository();
$movies = $movieRepository->getAllMovies();

echo "<div class='container'>
        <table class='table' style='text-align=center'>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Main Actor</th>
            <th>Thumbnail</th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>";

foreach($movies as $movie) {
    echo "
        <tr>
            <td>".$movie['title']."</td>
            <td>".$movie['description']."</td>
            <td>".$movie['main_actor']."</td>
            <td>".$movie['thumbnail']."</td>
            <td>".$movie['duration']."</td>
            <td class='form-group'>
                <form method='GET' action='update.php'>
                    <button class='btn btn-success' 'type='submit' name='movie_id' value='".$movie['id']."'>Update</button>
                </form>
                <form method='POST' action='delete.php'>
                    <button class='btn btn-danger' type='submit' name='delete' value='".$movie['id']."'>Delete</button>
                </form>
            </td>
        </tr>
    ";
}

echo "</table>
    </div>
  </body>
</html>";