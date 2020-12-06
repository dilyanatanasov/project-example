<?php

class Printer {
    public static function formatted($data) {
        if (is_array($data)) {
            foreach($data as $row) {
                echo "<pre>";
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