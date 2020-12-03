<?php

require_once "BaseModel.php";
require_once dirname(dirname(__FILE__)) . "/repositories/MovieRepository.php";

class Movie extends BaseModel {
    public $id;
    public $title;
    public $descriotion;
    public $main_actor;
    public $thumbnail;
    public $duration;
    private $movieRepository;

    function __construct() {
        $this->movieRepository = new MovieRepository();
    }

    public function view($id) {
        $movie = $this->movieRepository->getMovieById($id);
        $movieInstance = new Movie();
        $movieInstance->id = $movie["id"];
        $movieInstance->title = $movie["title"];
        $movieInstance->description = $movie["description"];
        $movieInstance->main_actor = $movie["main_actor"];
        $movieInstance->thumbnail = $movie["thumbnail"];
        $movieInstance->duration = $movie["duration"];
        return $movieInstance;
    }

    public function list() {
        $movies = $this->movieRepository->getAllMovies();
        $moviesData = [];
        foreach($movies as $movie) {
            $movieInstance = new Movie();
            $movieInstance->id = $movie["id"];
            $movieInstance->title = $movie["title"];
            $movieInstance->description = $movie["description"];
            $movieInstance->main_actor = $movie["main_actor"];
            $movieInstance->thumbnail = $movie["thumbnail"];
            $movieInstance->duration = $movie["duration"];
            array_push($moviesData, $movieInstance);
        }
        return $moviesData;
    }

    public function create() {
        
    }

    public function update() {
        
    }

    public function delete() {
        
    }
}