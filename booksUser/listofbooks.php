<?php 
    include '../others/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/tablesbuttons.css">
</head>
<body>
    <div class="header">
        <h3>Library Management System</h3>
    </div>
    <div class="container">

        <div class="sidebar">
            <ul>
                <img src="../img/logo.png" alt="">
                <h3>User</h3>
                <hr>
                <a href="../dashboard.php"><li>Dashboard</li></a>
                <a href="../borrowers/listofborrowers.php"><li>List of Borrowers</li></a>                
                <a href="listofbooks.php"><li class="active">List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>List of Books</h2>

            <div class="head">
                <!-- Search -->
                <form action="booksResult.php" method="get">
                    <input type="text" name="search" id="">
                    <input type="submit" value="Search" id="search">
                </form>
                <a href="addbook.php"><button class="addstudent">Add Book</button></a>
                <a href="listofbooks.php"><button class="addstudent">Refresh</button></a>
            </div>

            
            <table>
                <tr>
                <th style="width:5%">Book ID</th>
                    <th style="width:10%">Title</th>
                    <th style="width:10%">Author's name</th>
                    <th style="width:5%">Category</th>
                    <th style="width:10%">Operations</th>
                </tr>
                
                <?php

                    $sql = "SELECT * FROM `list_of_books_tbl` ORDER BY book_id DESC";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            // From database (not from form)
                            $book_id = $row['book_id'];
                            $title = $row['title'];
                            $author_name = $row['author_name'];
                            $category = $row['category'];
                            $description = $row['description'];

                            echo '
                            <tr>
                            <td>'.$book_id.'</th>
                            <td>'.$title.'</th>
                            <td>'.$author_name.'</td>
                            <td>'.$category.'</td>
                            <td><a href="viewBookInfo.php?viewID='.$book_id.'"><button class="view">View</button></a>
                            <a href="borrowBook.php?borrowID='.$book_id.'" onclick="return confirmation()"><button class="update">Borrow</button></a>
                            </td>


                            </tr>
                            ';

                        }
                    }

                    ?>
                
            </table>

        </div>

    </div>
    <script>
        function confirmation() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>