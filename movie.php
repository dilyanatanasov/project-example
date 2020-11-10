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
                <a href='/project-example/movie.php?token=abc1234&action=delete&data=".$movie['id']."'><button class='btn btn-danger'>Delete</button></a>
            </td>
        </tr>
    ";
}
echo "</table>
    <h4 id='snackbar' class='hideSnackbar'></h1>
";

?>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get("token");
    const action = urlParams.get("action");
    const data = urlParams.get("data");

    showMessage = (message) => {
        let snackbar = document.getElementById("snackbar");
        document.getElementById("snackbar").innerHTML = message;
        snackbar.style.display = "block";
        snackbar.style.padding = "10px";
        setTimeout(() => {
            window.location.href = "http://localhost/project-example/movie.php";
        }, 2000)
    }

    if (
        token !== undefined &&
        action !== undefined &&
        data !== undefined
    ) {
        postData("http://localhost/project-example/api/api.php", {
            token: token,
            action: action,
            data: data
        }).then((data) => {
            if (data.message !== undefined && data.message === "Successfully deleted") {
                showMessage(data.message);
            } else {
                console.log("Unauthorized");
            }
        });    
    }
    
</script>
     </div>
  </body>
</html>