<?php 

    $servername = "localhost";
    $username = "user";
    $sql_password = "password";
    $dbname = "mf_database";


    //connect to database
    $conn = new mysqli($servername, $username, $sql_password, $dbname);
    

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


?>