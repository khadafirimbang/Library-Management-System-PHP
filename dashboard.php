<?php
    include './others/connection.php';

    $totalBorrowers = $totalBooks = $totalReturnedBooks = $totalNotReturnedBooks  = 0;
    $sqlBorrowers = "SELECT * FROM list_of_borrowers_tbl";
    $resultBorrowers = mysqli_query($conn, $sqlBorrowers);
    if($resultBorrowers) {
        while($row = mysqli_fetch_assoc($resultBorrowers)) {
            $totalBorrowers++;
            $status = $row['status'];
            if($status == "Returned") {
                $totalReturnedBooks++;
            }
            if($status == "Not Returned") {
                $totalNotReturnedBooks++;
            }
        }
    }


    $sqlBooks = "SELECT * FROM list_of_books_tbl";
    $resultBooks = mysqli_query($conn, $sqlBooks);
    if($resultBooks) {
        while($row = mysqli_fetch_assoc($resultBooks)) {
            $totalBooks++;
        }
    }

    

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/layout2.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/tablesbuttons.css">
</head>
<body>
    <div class="header">
        <h3>Library Management System</h3>
    </div>
    <div class="container">

        <div class="sidebar">
            <ul>
                <img src="./img/logo.png" alt="">
                <h3>Admin</h3>
                <hr>
                <a href="dashboard.php"><li class="active">Dashboard</li></a>
                <a href="./borrowers/listofborrowers.php"><li>List of Borrowers</li></a>
                <a href="./books/listofbooks.php"><li>List of Books</li></a>
                <a href="./returned.php"><li>List of Returned Books</li></a>
                <a href="./notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="./others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>Dashboard</h2>
            <div class="infos">
                <h3>Total of Borrowers: <?php echo $totalBorrowers; ?></h3>
                <h3>Total of Books: <?php echo $totalBooks; ?></h3>
                <h3>Total of Returned Books: <?php echo $totalReturnedBooks; ?></h3>
                <h3>Total of Not Returned Books: <?php echo $totalNotReturnedBooks; ?></h3>
            </div>
        </div>

    </div>
</body>
</html>