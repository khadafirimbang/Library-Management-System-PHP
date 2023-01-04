<?php
	include '../others/connection.php';

    $titleErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $title = $_POST['title'];
            $author_name = $_POST['author_name'];
            $book_desc = $_POST['book_desc'];
            $category = $_POST['category'];
            $price = $_POST['price'];
        
            $sql = "SELECT * FROM `list_of_books_tbl` WHERE title = '$title' ";
            $check_title = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($check_title) > 0) {
                        $titleErr = "This Book is already registered!";
                    } else {
                        $sql = "INSERT INTO `list_of_books_tbl` (title, author_name, category, description, price) VALUES('$title', '$author_name', '$category', '$book_desc', '$price')";
                        $result = mysqli_query($conn, $sql);
                        if($result) {
                            echo "<script> alert('Added Successfully!'); </script>";
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
    <title>Add Book</title>
    <link rel="stylesheet" href="../css/layout2.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/addbook.css">
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
                <a href="../borrowers/listofborrowers.php"><li>List of Borrowers</li></a>
                <a href="listofbooks.php"><li class="active">List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            
            <div class="form">

            <form method="POST">
                <h1>Add Book</h1>
                <p style="color: red;"><?php echo $titleErr; ?></p>
                <input type="text" placeholder="Title" name="title" minlength="3" required>
                <br>
                <input type="text" placeholder="Author's Name" name="author_name" minlength="3" required>
                <br>
                <input type="number" placeholder="Price" name="price" minlength="1" required>
                <br>
                <textarea name="book_desc" class="book_desc" cols="30" rows="10" placeholder="Book Description" minlength="6" required></textarea>
                <br>
                <label>Category:</label>
                <select name="category" id="category" required>
                    <option value="">Select category</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Poetry">Poetry</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non Fiction">Non Fiction</option>
                    <option value="History">History</option>
                    <option value="Mathematical Fiction">Mathematical Fiction</option>
                    <option value="Literature">Literature</option>
                    <option value="Computer Science Fiction">Computer Science Fiction</option>
                </select>

                <br>

                <input type="submit" value="ADD" name="add" class="add">
                
            </form>

            <a href="listofbooks.php"><button>BACK</button></a>
        </div>

        </div>

    </div>
</body>
</html>