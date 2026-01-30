<?php

    // Create our connection to the database

    $enviroment = 'localhost';
    $username = 'root';
    $password = ''; // for windows
    /*$password = 'root'; for mac */

    $db = 'db_londonaviation';

    $connect = new mysqli($enviroment, $username, $password, $db);

    if(mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


?>