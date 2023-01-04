<?php
	include 'connection.php';
    
    $firstname = $middlename = $lastname = $age = $address = $mobileno = $email = $course = $year_level = $section = $password = $cpassword = "";
    $firstnameErr = $middlenameErr = $lastnameErr = $ageErr = $addressErr = $mobilenoErr = $emailErr = $year_levelErr = $courseErr = $sectionErr = $passwordErr = $cpasswordErr = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        if(empty($_POST["firstname"])) {
            $firstnameErr = "Firstname is required!";
        } else {
            $firstname = $_POST['firstname'];
        }
        if(empty($_POST["middlename"])) {
            $middlenameErr = "Middlename is required!";
        } else {
            $middlename = $_POST['middlename'];
        }
        if(empty($_POST["lastname"])) {
            $lastnameErr = "Lastname is required!";
        } else {
            $lastname = $_POST['lastname'];
        }
        if(empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = $_POST['email'];
        }
        if(empty($_POST["password"])) {
            $passwordErr = "Password is required!";
        } else {
            $password = $_POST['password'];
        }
        if(empty($_POST["cpassword"])) {
            $cpasswordErr = "Confirm Password is required!";
        } else {
            $cpassword = $_POST['cpassword'];
        }

        

        if(!empty($_POST["lastname"]) and !empty($_POST["firstname"]) and !empty($_POST["middlename"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["cpassword"])  ) {

            $sql = "SELECT * FROM `accounts_tbl` WHERE email='$email' ";
            $check_email = mysqli_query($conn, $sql);
            
            if($password === $cpassword) {
                    if(mysqli_num_rows($check_email) > 0) {
                        $emailErr = "This Email is already registered!";
                    } else {
                        $sql = "INSERT INTO `accounts_tbl` (lastname, firstname, middlename, email, password, cpassword, account_type) VALUES('$lastname', '$firstname', '$middlename', '$email', '$password', '$cpassword', 1)";
                        $result = mysqli_query($conn, $sql);
                        if($result) {
                            echo "<script> alert('Registration complete!'); </script>";
                        }
                    }

            } else {
                echo "<script> alert('The password and confirm password did not match.'); </script>";
            }
			
            
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        </style>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>

    <div class="container">

            <!-- <div class="left">
                <img src="pic.png" alt="picture">
            </div> -->

        <div class="form">

            <form method="POST">
                <h1>Register</h1>
				<p style="color: red;"><?php echo $firstnameErr; ?></p>
                <input type="text" placeholder="Firstname" name="firstname" minlength="3" >

                <p style="color: red;"><?php echo $middlenameErr; ?></p>
                <input type="text" placeholder="Middlename" name="middlename" minlength="3" >

                <p style="color: red;"><?php echo $lastnameErr; ?></p>
                <input type="text" placeholder="Lastname" name="lastname" minlength="3" >

				<p style="color: red;"><?php echo $emailErr; ?></p>
                <input type="email" placeholder="Email" name="email" minlength="6" >

				<p style="color: red;"><?php echo $passwordErr; ?></p>
                <input type="password" placeholder="Password" name="password" min="6" >

				<p style="color: red;"><?php echo $cpasswordErr; ?></p>
				<input type="password" placeholder="Confirm password" name="cpassword" minlength="6" >
                <br>

                <input type="submit" value="Register" name="register" class="login">
                
            </form>

            <a href="login.php"><button>Login</button></a>
        </div>

    </div>

</body>
</html>