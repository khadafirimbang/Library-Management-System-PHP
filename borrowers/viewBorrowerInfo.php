<?php
    include '../others/connection.php';

    $sql = "SELECT * FROM list_of_borrowers_tbl";
    $result = mysqli_query($conn, $sql);

    $totalStudents  = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower's Information</title>
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
                <a href="./listofborrowers.php"><li class="active">List of Borrowers</li></a>
                <a href="../books/listofbooks.php"><li>List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>Borrower's Information</h2>

            <?php
                    $id = $_GET['viewID'];
                    $sql = "SELECT * FROM list_of_borrowers_tbl WHERE borrower_id=$id";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            // From database (not from form)
                            $book_title = $row['book_title'];
                            $lastname = $row['lastname'];
                            $firstname = $row['firstname'];
                            $middlename = $row['middlename'];
                            $borrower_name = "$lastname $firstname $middlename";
                            $borrower_id = $row['borrower_id'];
                            $due_date = $row['due_date'];
                            $return_date = $row['return_date'];
                            $middlename = $row['middlename'];
                            $id = $row['borrower_id'];
                            $status = $row['status'];
                            $address = $row['address'];
                            $mobileno = $row['mobileno'];
                            $email = $row['email'];
                            $year_level = $row['year_level'];
                            $section = $row['section'];
                            $course = $row['course'];
                            $age = $row['age'];
                            $role = $row['role'];

                            echo '
                            <p><b>Name: </b>'.$lastname.', '.$firstname.' '.$middlename.'.</p>
                            <p><b>Age: </b>'.$age.'</p>
                            <p><b>Address: </b>'.$address.'</p>
                            <p><b>Mobile No: </b>'.$mobileno.'</p>
                            <p><b>Email: </b>'.$email.'</p>
                            <p><b>Course: '.$course.'</p>
                            <p><b>Year level: </b>'.$year_level.'</p>
                            <p><b>Section: </b>'.$section.'</p>
                            <p><b>Role: </b>'.$role.'</p>
                            <p><b>Borrowed Book: </b>'.$book_title.'</p>
                            <p><b>Status: </b>'.$status.'</p>
                            ';

                        }
                    }

                    ?>

            <a href="listofborrowers.php"><button>BACK</button></a>
            
        </div>

    </div>
</body>
</html>