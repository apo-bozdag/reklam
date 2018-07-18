<?php

$homeUrl = "http://localhost/reklam";

function db () {
    static $conn;
    if ($conn===NULL){
        $conn = mysqli_connect ("localhost", "root", "", "reklam");
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}