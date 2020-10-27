<?php
require_once dirname(dirname(__FILE__)). "/core/Db.php";

class MovieRepository extends Db {
    function __constructor() {
        // TODO
    }

    public function addNewMovie($title, $description, $main_actor, $thumbnail, $duration) {
        $sql = "
            INSERT INTO
                movies(`id`,`title`, `description`, `main_actor`, `thumbnail`, `duration`)
            VALUES
                (
                    NULL, 
                    '".$title."', 
                    '".$description."',
                    '".$main_actor."',
                    '".$thumbnail."',
                    ".$duration."
                );
        ";

        $this->connection->exec($sql);
        return true;
    }

    public function getAllMovies() {
        $sql = "SELECT * FROM movies";
        $result = $this->connection->query($sql);
        $movies = $result->fetchAll();

        if (!empty($movies)) {
            return $movies;
        } else {
            return [];
        }
    }
}