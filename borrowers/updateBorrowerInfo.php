<?php
    include '../others/connection.php';

    $id = $_GET['updateID'];
    $sql = "SELECT * FROM `list_of_borrowers_tbl` WHERE borrower_id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $lastname = $row['lastname'];
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $age = $row['age'];
    $email = $row['email'];
    $mobileno = $row['mobileno'];
    $address = $row['address'];
    $section = $row['section'];
    $password = $row['password'];
    $cpassword = $row['cpassword'];
    $course = $row['course'];
    $year_level = $row['year_level'];
    $book_title = $row['book_title'];
    $borrower_name = "$lastname $firstname $middlename";
    $due_date = $row['due_date'];
    $return_date = $row['return_date'];
    $status = $row['status'];


    if(isset($_POST['update'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];
        $address = $_POST['address'];
        $section = $_POST['section'];
        $course = $_POST['course'];
        $year_level = $_POST['year_level'];
        $status = $_POST['status'];
        $due_date = $_POST['due_date'];
        $return_date = $_POST['return_date'];

        $sql = "UPDATE `list_of_borrowers_tbl` SET borrower_id=$id, lastname='$lastname', firstname='$firstname', middlename='$middlename', age='$age', address='$address', mobileno='$mobileno', email='$email', course='$course', year_level='$year_level', section='$section', status='$status', return_date='$return_date', due_date='$due_date'    WHERE borrower_id=$id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header('Location: listofborrowers.php');
        } else {
            die(mysqli_error($conn));
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
                <h1>Update Borrower Info</h1>

                <input type="text" placeholder="Firstname" name="firstname" minlength="3" value="<?php echo $firstname; ?>" required>

                <input type="text" placeholder="Middlename" name="middlename" value="<?php echo $middlename; ?>" minlength="3" required>

                <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname; ?>" minlength="3" required> 

                <input type="number" placeholder="Age" name="age" value="<?php echo $age; ?>" required>

                <input type="text" placeholder="Address" name="address" minlength="6" value="<?php echo $address; ?>" required>

                <input type="number" placeholder="Mobile number" name="mobileno" minlength="11" maxlength="11" value="<?php echo $mobileno; ?>" required> 

                <input type="email" placeholder="Email" name="email" minlength="6" value="<?php echo $email; ?>" required>

                <input type="number" placeholder="Section (optional)" name="section" value="<?php echo $section; ?>"> 

                <br>

                <label>Course:</label>
                <select name="course" id="course" required>
                    <option value="BSIT" <?php if($course == "BSIT") { echo "selected"; } ?> >BSIT</option>
                    <option value="BSBA" <?php if($course == "BSBA") { echo "selected"; } ?> >BSBA</option>
                    <option value="BSCPE" <?php if($course == "BSCPE") { echo "selected"; } ?> >BSCPE</option>
                </select>

                <label>Year Level:</label>
                <select name="year_level" id="year_level" required>
                    <option value="1st Year" <?php if($year_level == "1st Year") { echo "selected"; } ?> >1st Year</option>
                    <option value="2nd Year" <?php if($year_level == "2nd Year") { echo "selected"; } ?> >2nd Year</option>
                    <option value="3rd Year" <?php if($year_level == "3rd Year") { echo "selected"; } ?> >3rd Year</option>
                    <option value="4th Year" <?php if($year_level == "4th Year") { echo "selected"; } ?> >4th Year</option>
                </select>
                
                <br>
                <label>Book Status:</label>
                <select name="status" id="" required>
                    <option value="Borrowing" <?php if($status == "Borrowing") { echo "selected"; } ?> >Borrowing</option>
                    <option value="Returned" <?php if($status == "Returned") { echo "selected"; } ?> >Returned</option>
                    <option value="Not Returned" <?php if($status == "Not Returned") { echo "selected"; } ?> >Not Returned</option>
                </select>
                    <br>
                <label for="">Due Date</label>
                <input type="date" name="due_date" value="<?php echo $due_date; ?>" required>
                
                <label for="">Returned Date</label>
                <input type="date" name="return_date" value="<?php echo $return_date; ?>" >
         
                <br>

                <input type="submit" value="UPDATE" name="update" class="add" onclick="return confirmation()">
                
            </form>

            <a href="listofborrowers.php"><button>BACK</button></a>
        </div>

        </div>

    </div>

    <script>
        function confirmation() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>

</body>
</html>