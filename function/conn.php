<?php
// Database connection settings
$servername = "localhost";
$port = 3306;
$username = "root";
$password = "";
$dbname = "learning_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}
?>
