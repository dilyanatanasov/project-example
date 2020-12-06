<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My first page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="/project-example/views/css/main.css"></script>
        <script type="text/javascript" src="/project-example/views/js/api.js"></script>
    </head>
    <body>

<?php
session_start();
require_once dirname(dirname(dirname(__FILE__))) . "/helpers/Printer.php";

if (!empty($_SESSION)) {
    if ($_SESSION["access"] == 1) {
        echo '
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top mb-2">
            <div class="container">
                <a class="navbar-brand" href="#">
                        <h1>Movies</h1>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/project-example/homepage.php">Home
                                <span class="sr-only">(current)</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/modify_user.php">Modify User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/movie.php">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/addMovie.php">AddMovie</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="/project-example/homepage.php">
                                <!-- To give data of button you have to give it a name attribute-->
                                <button class="btn btn-warning" type="submit" name="logout" value="logout">Logout</button>
                            </form>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>';
    } elseif ($_SESSION["access"] == 0) {
        echo '
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top mb-2">
            <div class="container">
                <a class="navbar-brand" href="#">
                        <h1>Movies</h1>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/project-example/homepage.php">Home
                                <span class="sr-only">(current)</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project-example/movie.php">Movies</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="/project-example/homepage.php">
                                <!-- To give data of button you have to give it a name attribute-->
                                <button class="btn btn-warning" type="submit" name="logout" value="logout">Logout</button>
                            </form>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>';
    }
}
?>
