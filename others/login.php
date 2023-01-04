<?php
    include 'connection.php';
	$email = $password = "";
    $emailErr = $passwordErr = "";  
    

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
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
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($email && $password) {
            
            $check_email = mysqli_query($conn, "SELECT * FROM accounts_tbl WHERE email = '$email' ");
            $check_email_row = mysqli_num_rows($check_email);
            
            if($check_email_row > 0) {
                while($row = mysqli_fetch_assoc($check_email)) {
                    $db_password = $row["password"];
                    $account_type = $row["account_type"];
                    
                    if($db_password === $password) {
                        // header('Location: ../dashboard.php');
                        if($account_type == "1") {
                            header('Location: ../dashboard.php');
                        } else {
                            // echo "<script>window.location.href = 'user.php'; </script>";
                            header('Location: ../booksUser/listofbooks.php');
                        }
                    } else { 
                        $passwordErr = "Password is incorrect!";
                    }
                } 
            }else {
                        $emailErr = "Email is not registered!";
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
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        </style>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <div class="container">

            <div class="left">
                <img src="pic.png" alt="picture">
            </div>

        <div class="form">

            <form class="form" method = "POST">
                <h1>Login</h1>
				<p style="color: red;"><?php echo $emailErr ?></p>
                <input type="email" placeholder="Email" name="email">
				<p style="color: red;"><?php echo $passwordErr ?></p>
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Login" class="login">
                
            </form>
            <button onclick="forgotBtn()">Forgot your password?</button>
                <hr>
            <a href="registration.php"><button>Register</button></a>
        </div>

    </div>

        <dialog id="modal">
            <div class="content">
                <p>Retrieve your account</p>
            <form action="">
                <input type="email" placeholder="Enter your email" required>
            <button id="reset">Reset password</button>
            </form>
            <button onclick="closeBtn()" id="close">Close</button>
            </div>
        </dialog>
    
    <script src="./js/forgot_password.js"></script>
</body>
</html>