<?php
require_once dirname(__FILE__). "/repositories/MovieRepository.php";

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/movies.html";

function loadTableContentData($movies) {
    foreach($movies as $movie) {
        echo "
            <tr>
                <td>".$movie['title']."</td>
                <td>".$movie['description']."</td>
                <td>".$movie['main_actor']."</td>
                <td><img style='width:100px' src='views/img/".$movie['thumbnail']."'/></td>
                <td>".$movie['duration']."</td>
                <td class='form-group'>";
        if ($_SESSION["access"] == 1) {
            echo "<form class='mb-2' method='GET' action='update.php'>
                    <button class='btn btn-success' 'type='submit' name='movie_id' value='".$movie['id']."'>Update</button>
                </form>
                <a href='/project-example/movie.php?token=abc1234&action=delete&data=".$movie['id']."'><button class='btn btn-danger'>Delete</button></a>";
        } elseif ($_SESSION["access"] == 0) {
            echo "<h6>Not Available</h4>";
        }
    
        echo "</td>
            </tr>
        ";
    }
}
$movieRepository = new MovieRepository();

$input_topic_data;
if (!empty($_POST["search_topic"])) {
    $input_topic_data = $_POST["search_topic"];
} else {
    $input_topic_data = "";
}

echo "<form method='POST' action='movie.php' class='container'>
        <input type='text' name='search_topic' value='".$input_topic_data."'>
        <button type='submit' class='btn btn-primary mb-2'>Search</button>
    </form>";

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
if (!empty($_POST["search_topic"])) {
    $search_topic = $_POST["search_topic"];
    $movie_search_results = $movieRepository->getMovieSearchResults($search_topic);
    loadTableContentData($movie_search_results);
} else {
    $movies = $movieRepository->getAllMovies();
    loadTableContentData($movies);
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

