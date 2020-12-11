<?php

class Printer {
    public static function format($data) {
        if (is_array($data)) {
            foreach($data as $key => $row) {
                echo "<pre>";
                print_r($key);
                echo "<br>";
                print_r($row);
                echo "</pre>";
            }
        } else {
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }
}