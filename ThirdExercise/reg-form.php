<?php
include("../connection.php");
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone">
    
    <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "phone",FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
        echo "Please enter a username.";
    }

    elseif(empty($password)){
        echo "Please enter a password.";
    } 
    
    elseif(empty($phone)){
        echo "Please enter a phone number.";
    }
    
    else{
        $hashed_password = sha1($password);
        $sql = "INSERT INTO 6470exerciseusers (username, password_hash, phone_num) VALUES ('$username', '$hashed_password','$phone')";
        mysqli_query($conn, $sql);
        echo "You are registered";
    }
    mysqli_close($conn);
}
?>
