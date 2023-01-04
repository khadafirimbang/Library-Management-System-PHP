<?php
	include '../others/connection.php';
    
    $firstname = $middlename = $lastname = $age = $address = $mobileno = $email = $course = $year_level = $section = $password = $cpassword = "";

    $sql = "SELECT * FROM list_of_books_tbl";
                    $result = mysqli_query($conn, $sql);

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $mobileno = $_POST['mobileno'];
            $email = $_POST['email'];
            $course = $_POST['course'];
            $year_level = $_POST['year_level'];
            $section = $_POST['section'];
            $book_title = $_POST['book_title'];
            $borrower_name = "$lastname $firstname $middlename";
            $due_date = $_POST['due_date'];
            $role = $_POST['role'];
            $fine;
            $title;
            $price;

            $sqlBook = "SELECT * FROM `list_of_books_tbl` ";
            $resultBook = mysqli_query($conn, $sqlBook);

            if($resultBook) {
                while($row = mysqli_fetch_assoc($resultBook)) {
                    // From database (not from form)
                    $title = $row['title'];
                    $price = $row['price'];

                }

            }

            if($book_title == $title) {
                $fine = $price;
            }
            // else if($book_title == "The Symmetry of Fish") {
            //     $fine = 700;
            // }
            // else if($book_title == "Blood, Sweat, and Pixels: The Triumphant, Turbulent Stories Behind How Video Games Are Made") {
            //     $fine = 800;
            // }
            // else if($book_title == "The Clean Coder: A
            // Code of Conduct for
            // Professional
            // Programmers") {
            //     $fine = 650;
            // }
            // else if($book_title == "Chokepoint
            // Capitalism: How Big
            // Tech and Big Content
            // Captured Creative
            // Labor Markets and
            // How We&#39;ll Win Them
            // Back") {
            //     $fine = 999;
            // }
            

                        $sql = "INSERT INTO `list_of_borrowers_tbl` (book_title, lastname, firstname, middlename, age, address, mobileno, email, course, year_level, section, due_date, status, role, fine) VALUES('$book_title', '$lastname', '$firstname', '$middlename', '$age', '$address', '$mobileno', '$email', '$course', '$year_level', '$section', '$due_date', 'Borrowing', '$role', '$fine')";
                        $result = mysqli_query($conn, $sql);
                        if($result) {

                            echo "<script> alert('Added Successfully!'); </script>";
                        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Borrower</title>
    <link rel="stylesheet" href="../css/layout2.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/addstudent.css">
    <link rel="stylesheet" href="../css/selections.css">
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

            <div class="form">

            <form method="POST">
                <h1>Add Borrower</h1>
                <input type="text" placeholder="Firstname" name="firstname" minlength="3" required>

                <input type="text" placeholder="Middlename" name="middlename" required>

                <input type="text" placeholder="Lastname" name="lastname" minlength="3" required> 

                <input type="number" placeholder="Age" name="age" required>

                <input type="text" placeholder="Address" name="address" minlength="6" required>

                <input type="number" placeholder="Mobile number" name="mobileno" minlength="11" maxlength="11" required> 

                <input type="email" placeholder="Email" name="email" minlength="6" required>

                <input type="number" placeholder="Section (optional)" name="section"> 

                <br>

                <label>Role:</label>
                <select name="role" id="" required>
                    <option value="">Select role</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Staff">Staff</option>
                </select>

                <label>Course:</label>
                <select name="course" id="course" required>
                    <option value="">Select course</option>
                    <option value="N/A">N/A</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSBA">BSBA</option>
                    <option value="BSCPE">BSCPE</option>
                </select>

                <label>Year Level:</label>
                <select name="year_level" id="year_level" required>
                <option value="">Select year</option>
                    <option value="N/A">N/A</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                </select>
                
                <br>
                <label>Books:</label>
                <select name="book_title" id="book_title" required>
                <option value="">Select book</option>
                <?php

                    $sql = "SELECT * FROM list_of_books_tbl";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            // From database (not from form)
                            $title = $row['title'];

                            echo '<option value="'.$title.'">'.$title.'</option>';

                        }
                    }

                    ?>
                </select>

                <br>
                <label for="">Due Date</label>
                <input type="date" placeholder="" name="due_date" required>

                <!-- <input type="password" placeholder="Password" name="password" required>

                <input type="password" placeholder="Confirm password" name="cpassword" required> -->
   
                <br>

                <input type="submit" value="ADD" name="add" class="add">
                
            </form>

            <a href="listofborrowers.php"><button>BACK</button></a>
        </div>

        </div>

    </div>
</body>
</html>