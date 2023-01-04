<?php
    include '../others/connection.php';

    if(isset($_GET['deleteID'])) {
        $book_id = $_GET['deleteID'];
        $sql = "DELETE FROM `list_of_books_tbl` WHERE book_id=$book_id"; 
        $result = mysqli_query($conn, $sql);

        if($result) {
            header('Location: listofbooks.php');
        } else {
            die(mysqli_error($conn));
        }
    }


?>