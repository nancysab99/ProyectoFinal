<?php
$hostname = "localhost";
$database = "desarrollo_aplicaciones";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    }

    mysqli_set_charset($mysqli,"utf8");

$urlweb = "http//localhost/2022/proyecto_web/";
    
?>