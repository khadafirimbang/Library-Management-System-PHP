<?php
    include '../others/connection.php';

    $sql = "SELECT * FROM list_of_books_tbl";
    $result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book's Information</title>
    <link rel="stylesheet" href="../css/layout2.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/view.css">
    <link rel="stylesheet" href="../css/addstudent.css">
</head>
<body>
    <div class="header">
        <h3>Library Management System</h3>
    </div>
    <div class="container">

        <div class="sidebar">
            <ul>
                <img src="../img/logo.png" alt="">
                <h3>Admin</h3>
                <hr>
                <a href="../dashboard.php"><li>Dashboard</li></a>
                <a href="../books/listofbooks.php"><li>List of Borrowers</li></a>
                <a href="../books/listofbooks.php"><li class="active">List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>Book's Information</h2>

            <?php
                    $id = $_GET['viewID'];
                    $sql = "SELECT * FROM list_of_books_tbl WHERE book_id=$id";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            // From database (not from form)
                            $book_id = $row['book_id'];
                            $book_title = $row['title'];
                            $author_name = $row['author_name'];
                            $category = $row['category'];
                            $description = $row['description'];
                            $price = $row['price'];

                            echo "
                            <p><b>Book ID: </b>$book_id</p>
                            <p><b>Book Title: </b>$book_title</p>
                            <p><b>Author's Name: </b>$author_name</p>
                            <p><b>Category: </b>$category</p>
                            <p><b>Price: </b>$price</p>
                            <p><b>Description: </b>$description</p>
                            ";

                        }
                    }

                    ?>

            <a href="listofbooks.php"><button>BACK</button></a>
            
        </div>

    </div>
</body>
</html>