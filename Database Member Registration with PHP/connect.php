<?php

    $host = "localhost";
    $user = "root";
    $parola = "";
    $dataBase = "membership";

    $connect = mysqli_connect($host, $user, $parola, $dataBase);

    mysqli_set_charset($connect, "UTF8");
    
?>