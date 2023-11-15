<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars( $_SERVER["PHP_SELF"])?>" method="post">
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
}
if(empty($username)){
    echo "Please enter a username.";
}

elseif(empty($password)){
    echo "Please enter a password.";
}else{
    $hash =password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO 6470exerciseusers (username, password_hash) VALUES ('$username', '$hash')";
    mysqli_query($conn, $sql);
    echo "u regeistred";
}
mysqli_close($conn)

?>
