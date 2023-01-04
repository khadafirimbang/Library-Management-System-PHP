<?php
    $localhost = "localhost:3307";
    $username = "root";
    $password = "";
    $db_name = "lms_db";

    $conn = new mysqli($localhost, $username, $password, $db_name);

    // if($conn) {
    //     echo "Connected!";
    // } else {
    //     die(mysqli_error($conn));
    // }

?>