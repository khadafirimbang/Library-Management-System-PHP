<?php
    include '../others/connection.php';

    $book_id = $_GET['updateID'];
    $sql = "SELECT * FROM `list_of_books_tbl` WHERE book_id=$book_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $author_name = $row['author_name'];
    $description = $row['description'];
    $category = $row['category'];


    if(isset($_POST['update'])) {
        $title = $_POST['title'];
        $author_name = $_POST['author_name'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        $sql = "UPDATE `list_of_books_tbl` SET book_id=$book_id, title='$title', author_name='$author_name', description='$description', category='$category' WHERE book_id=$book_id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header('Location: listofbooks.php');
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
    <title>List of Books</title>
    <link rel="stylesheet" href="../css/layout2.css">
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <a href="../borrowers/listofborrowers.php"><li>List of Borrowers</li></a>
                <a href="../books/listofbooks.php"><li class="active">List of Books</li></a>
                <a href="../returned.php"><li>List of Returned Books</li></a>
                <a href="../notreturned.php"><li>List of Not Returned Books</li></a>
                <a href="../others/login.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">

            <div class="form">

            <form method="POST">
                <h1>Update Book Info</h1>
                <input type="text" placeholder="Title" name="title" minlength="3" required value="<?php echo $title; ?>" required>
                <br>
                <input type="text" placeholder="Author's Name" name="author_name" minlength="3" required value="<?php echo $author_name; ?>" required>
                <br>
                <textarea name="description" class="book_desc" cols="30" rows="10" placeholder="Book Description" minlength="6" required> <?php echo $description; ?> </textarea>
                <br>
                <label>Category:</label>
                <select name="category" id="category" required>
                    <option value="Science" <?php if($category == "Science") { echo "selected"; } ?> >Science</option>
                    <option value="Philosopy" <?php if($category == "Philosopy") { echo "selected"; } ?> >Philosopy</option>
                    <option value="Mathematics" <?php if($category == "Mathematics") { echo "selected"; } ?> >Mathematics</option>
                </select>
         
                <br>

                <input type="submit" value="UPDATE" name="update" class="add" onclick="return confirmation()">
                
            </form>

            <a href="listofbooks.php"><button>BACK</button></a>
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