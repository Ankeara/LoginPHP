<?php
    $sName = "localhost";
    $rName = "root";
    $password = "";
    $dbName = "test";
    
    $conn = mysqli_connect($sName, $rName, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    