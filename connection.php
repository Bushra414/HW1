<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "6470";
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if ($conn) {
    echo "You are connected";
} else {
    die("Connection failed: " . $conn->connect_error);
}

?>