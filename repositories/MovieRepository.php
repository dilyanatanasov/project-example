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

    public function updateMovieById($id, $title, $description, $main_actor, $thumbnail, $duration) {
        $sql = "
            UPDATE
                movies
            SET 
              `title` = '".$title."',
              `description` = '".$description."',
              `main_actor` = '".$main_actor."',
              `thumbnail` = '".$thumbnail."',
              `duration` = '".$duration."'
            WHERE
                id = ".$id."
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

    public function getMovieById($id) {
        $sql = "SELECT * FROM movies WHERE id = ".$id.";";
        $result = $this->connection->query($sql);
        $movie = $result->fetchAll();

        if (!empty($movie)) {
            return $movie[0];
        } else {
            return [];
        }
    }

    public function deleteMovieById($id) {
        $sql = "DELETE FROM 
                    movies
                WHERE
                    id = ".$id.";";
        $this->connection->exec($sql);
        return true;
    }

    public function getMovieSearchResults($search_topic) {
        $topic_lowercase = strtolower($search_topic);
        $sql = "SELECT 
                    *
                FROM 
                    movies 
                WHERE
                    `title` LIKE '%$topic_lowercase%' OR
                    `description` LIKE '%$topic_lowercase%' OR
                    `main_actor` LIKE '%$topic_lowercase%'";
        $result = $this->connection->query($sql);
        return $result->fetchAll();
    }
}