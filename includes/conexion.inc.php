<?php

    session_start();

    $serverName = "localhost";
    $dbUserName = "root";
    $password = "";
    $dbName = "sistemabancario";

    $conn = mysqli_connect($serverName, $dbUserName, $password, $dbName);

    if (mysqli_connect_error()) {
        die ("Database Connection Error".mysqli_connect_error());  
    } 

?>