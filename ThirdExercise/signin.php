<?php
include('../connection.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "SELECT * FROM 6470exerciseusers WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $pass = $row['password_hash'];
            if(sha1($password) === $pass){
                echo "Welcome, $username!";
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
    }
    mysqli_close($conn);
    ?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regstyle.css">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
</form>
</body>
</html>
```
