<?php

    //TODO: create connection
    $user = 'root';
    $pass = '';
    $server = 'localhost';
    $db = 'mydb';

    $con = mysqli_connect($server, $user, $pass, $db);

    if(!$con){

        die('Failed to connect. ' . mysqli_connect_error(). PHP_EOL);
        exit;
    }
?>
