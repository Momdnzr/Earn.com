<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system.";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "Login successful!";
        // You can redirect the user to another page or perform other actions here
    } else {
        echo "Login failed. Check your username and password.";
    }
}

$conn->close();
?>
