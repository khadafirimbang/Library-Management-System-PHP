<?php
    include '../others/connection.php';

    if(isset($_GET['deleteID'])) {
        $id = $_GET['deleteID'];
        $sql = "DELETE FROM `list_of_borrowers_tbl` WHERE borrower_id=$id"; 
        $result = mysqli_query($conn, $sql);

        if($result) {
            header('Location: listofborrowers.php');
        } else {
            die(mysqli_error($conn));
        }
    }


?>