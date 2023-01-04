<?php
    include '../others/connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Borrowers</title>
    <link rel="stylesheet" href="../css/layout2.css">
    <link rel="stylesheet" href="../css/tablesbuttons.css">
    <link rel="stylesheet" href="../css/search.css">
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
                <a href="listofborrowers.php"><li class="active">List of Borrowers</li></a>
                <a href="../books/listofbooks.php"><li>List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <h2>List of Borrowers</h2>

            <div class="head">
                <!-- Search -->
                <form action="borrowersResult.php" method="get">
                    <input type="text" name="search" id="">
                    <input type="submit" value="Search" id="search">
                </form>
                <a href="addBorrower.php"><button class="addstudent">Add Borrower</button></a>
                <a href="listofborrowers.php"><button class="addstudent">Refresh</button></a>
            </div>

            <table>
                <tr>
                    <th style="width:15%">Book Title</th>
                    <th style="width:20%">Borrower's Name</th>
                    <th style="width:5%">Borrower's ID</th>
                    <th style="width:10%">Due Date</th>
                    <th style="width:10%">Return Date</th>
                    <th style="width:10%">Status</th>
                    <th style="width:20%">Operations</th>
                </tr>


                <?php
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM list_of_borrowers_tbl WHERE firstname LIKE '$search%' || middlename LIKE '$search%' || lastname LIKE '$search%' || borrower_id LIKE '$search%' || book_title LIKE '$search%' || due_date LIKE '$search%' || return_date LIKE '$search%' || status LIKE '$search%' ORDER BY borrower_id DESC";
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


                            echo '
                            <tr>
                            <td>'.$book_title.'</th>
                            <td>'.$borrower_name.'</th>
                            <td>'.$borrower_id.'</td>
                            <td>'.$due_date.'</td>
                            <td>'.$return_date.'</td>
                            <td>'.$status.'</td>
                            <td><a href="viewBorrowerInfo.php?viewID='.$id.'"><button class="view">View</button></a>
                            <a href="updateBorrowerInfo.php?updateID='.$id.'"><button class="update">Update</button></a>
                            <a href="deleteStudent.php?deleteID='.$id.'" onclick="return confirmation()"><button class="delete">Delete</button></a></td>



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